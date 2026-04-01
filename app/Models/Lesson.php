<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Lesson extends Model
{
    protected $fillable = ['module_id', 'title', 'text', 'order'];
    protected $casts = [
        'is_active' => 'boolean'
    ];
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function files()
    {
        return $this->hasMany(LessonFile::class);
    }

    public function videos()
    {
        return $this->hasMany(LessonVideo::class);
    }
}
