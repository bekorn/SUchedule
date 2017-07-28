<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    public $timestamps = null;

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function meetings()
    {
        return $this->belongsToMany(Meeting::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
