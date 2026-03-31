<?php

namespace App\Http\Policies;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\User;
use App\Http\Controllers;

class ModulePolicy
{
    public function update(User $user, Module $module)
    {
        return $user->id === $module->user_id;
    }

    public function delete(User $user, Module $module)
    {
        return $user->id === $module->user_id;
    }

    public function view(User $user, Module $module)
    {
        return $user->id === $module->user_id;
    }
}
