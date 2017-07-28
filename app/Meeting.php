<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    public $timestamps = null;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class);
    }
}
