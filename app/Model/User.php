<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function completed_courses()
    {
        return $this->belongsToMany(Course::class, 'completed_courses', 'user_id', 'course_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function liked_reviews()
    {
        return $this->belongsToMany(Review::class, 'review_likes', 'user_id', 'review_id');
    }

    public function mono_schedules()
    {
        return $this->hasMany(MonoSchedule::class);
    }

    public function mono_schedules_liked()
    {
        return $this->belongsToMany(MonoSchedule::class, 'mono_schedule_likes', 'user_id', 'mono_schedule_id');
    }

    public function mono_schedules_applied()
    {
        return $this->belongsToMany(MonoSchedule::class, 'mono_schedule_applied', 'user_id', 'mono_schedule_id')->withPivot('active');
    }

    public function active_mono_schedule()
    {
        return $this->mono_schedules_applied()->where('active', '=', true);
    }

    public function poly_schedules()
    {
        return $this->hasMany(PolySchedule::class);
    }

    public function poly_schedules_liked()
    {
        return $this->belongsToMany(PolySchedule::class, 'poly_schedule_likes', 'user_id', 'poly_schedule_id');
    }

    public function poly_schedules_applied()
    {
        return $this->belongsToMany(PolySchedule::class, 'poly_schedule_applied', 'user_id', 'poly_schedule_id')->withPivot('active');
    }

    public function active_poly_schedule()
    {
        return $this->poly_schedules_applied()->where('active', '=', true);
    }
}
