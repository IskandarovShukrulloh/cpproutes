<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Http\Policies\ModulePolicy;
class ModuleController extends Controller
{
    // Show user's own modules
    public function myModules()
    {
        $modules = auth()->user()->modules;
        return view('modules.my', compact('modules'));
    }

    // Create form
    public function create(){
        return view('modules.create');
    }

    // Store module (attach to authenticated user)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        auth()->user()->modules()->create($validated);

        return redirect()->route('modules.my')->with('success', 'Module created!');
    }

    // Edit form (check ownership)
    public function edit(Module $module)
    {
        // $this->authorize('update', $module); // Policy check
        return view('modules.edit', compact('module'));
    }

    // Update module (check ownership)
    public function update(Request $request, Module $module)
    {
       // $this->authorize('update', $module);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $module->update($validated);

        return redirect()->route('modules.my')->with('success', 'Module updated!');
    }

    // Delete module (check ownership)
    public function destroy(Module $module)
    {
        // $this->authorize('delete', $module);
        $module->delete();

        return redirect()->route('modules.my')->with('success', 'Module deleted!');
    }

    // Show module (public view)
    public function show(Module $module)
    {
        return view('modules.show', compact('module'));
    }

    // List all modules (public)
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }
}
