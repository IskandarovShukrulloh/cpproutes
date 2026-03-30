<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

//    public mixed $role;
    protected $fillable = ['fullname', 'email', 'password', "role", 'username'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Связь с модулями
    public function modules()
    {
        return $this->hasMany(Module::class, 'author_id');
    }

    // Связь со всеми уроками через модули
    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Module::class,
            'author_id', 'module_id', 'id', 'id');
    }
}
