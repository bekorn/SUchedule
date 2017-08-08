<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = null;

    public function requirements()
    {
        return $this->hasMany(Requirement::class, 'course_code', 'code');
    }

    public function required_courses()
    {
        return $this->hasManyThrough(Course::class, Requirement::class,
            'course_code', 'code', 'code');
//        TODO: Change this to the new belongsToMany relationship coming in Laravel 5.5
//        return $this->belongsToMany(Course::class, 'requirements', 'code', 'requirement');
    }

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class)->withPivot('primary');
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function completed_users()
    {
        return $this->belongsToMany(User::class, 'completed_courses', 'course_id', 'user_id');
    }

    public function in_mono_schedules()
    {
        return $this->belongsToMany(MonoSchedule::class, 'mono_has_courses', 'course_id', 'mono_schedule_id');
    }
}
