<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{

    public function create(Module $module)
    {
        return view('lessons.create', compact('module'));
    }

    public function store(Request $request, Module $module)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'nullable|string',
            'files.*' => 'file|max:20480', // 20MB
            'videos.*' => 'file|mimetypes:video/mp4,video/avi,video/mkv|max:102400' // 100MB
        ]);

        $order = $module->lessons()->count() + 1;

        $lesson = $module->lessons()->create([
            'title' => $validated['title'],
            'text' => $validated['text'] ?? null,
            'order' => $order
        ]);

        $basePath = "lessons/module_{$module->id}/lesson_{$order}";

        // files
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store("$basePath/files", 'public');
                $lesson->files()->create(['path' => $path]);
            }
        }

        // videos
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $path = $video->store("$basePath/videos", 'public');
                $lesson->videos()->create(['path' => $path]);
            }
        }

        return redirect()->route('modules.my')->with('success', 'Lesson created!');
    }

    public function show(Lesson $lesson)
    {
        return view('lessons.show', compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        // $this->authorize('update', $lesson);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'nullable|string',
        ]);

        $lesson->update($validated);

        return redirect()->route('modules.my')->with('success', 'Lesson updated!');
    }

    public function destroy(Lesson $lesson)
    {
        // $this->authorize('delete', $lesson);

        Storage::disk('public')->deleteDirectory(
            "lessons/module_{$lesson->module_id}/lesson_{$lesson->order}"
        );

        $lesson->delete();

        return back()->with('success', 'Lesson deleted!');
    }
}
