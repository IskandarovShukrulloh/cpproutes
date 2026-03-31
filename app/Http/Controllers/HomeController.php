<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
class HomeController extends Controller
{
    public function homepage() {
        $modules = Module::with('lessons')->get();
        return view('pages.homepage', compact('modules'));
    }
}
