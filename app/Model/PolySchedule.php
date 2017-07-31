<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PolySchedule extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users_liked()
    {
        return $this->belongsToMany(User::class, 'poly_schedule_likes', 'poly_schedule_id', 'user_id');
    }

    public function mono_schedules()
    {
        return $this->belongsToMany(MonoSchedule::class, 'poly_has_mono', 'poly_schedule_id', 'mono_schedule_id');
    }

    public function users_applied()
    {
        return $this->belongsToMany(User::class, 'poly_schedule_applied', 'poly_schedule_id', 'user_id')->withPivot('active');
    }

    public function active_users()
    {
        return $this->users_applied()->where('active', '=', true);
    }
}
