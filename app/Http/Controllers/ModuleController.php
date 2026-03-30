<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        return view('modules.create');
    }
        public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

//        $data['author_id'] = Auth::id(); // <- автоматически текущий пользователь

        \App\Models\Module::create($data);

        return redirect()->route('modules.index');
    }

    public function show(Module $module)
    {
        return view('modules.show', compact('module'));
    }

    public function edit(Module $module)
    {
        return view('modules.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $module->update($request->all());
        return redirect()->route('modules.index')->with('success', 'Module updated successfully!');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module deleted successfully!');
    }

}
