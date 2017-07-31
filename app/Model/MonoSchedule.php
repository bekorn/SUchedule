<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MonoSchedule extends Model
{
//    protected $with = ['courses'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users_liked()
    {
        return $this->belongsToMany(User::class, 'mono_schedule_likes', 'mono_schedule_id', 'user_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'mono_has_courses', 'mono_schedule_id', 'course_id');
    }

    public function users_applied()
    {
        return $this->belongsToMany(User::class, 'mono_schedule_applied', 'mono_schedule_id', 'user_id')->withPivot('active');
    }

    public function active_users()
    {
        return $this->users_applied()->where('active', '=', true);
    }
}
