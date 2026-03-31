<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Module extends Model
{
    protected $fillable = ['title', 'description', 'user_id', 'is_active'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
