<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';
    protected $fillable = ['title', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // FK
    public function module(){
        return $this->belongsTo(Module::class, 'module_id');
    }
}
