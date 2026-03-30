<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';
    protected $fillable = ['title', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Foreign Keys
    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'module_id');
    }
}
