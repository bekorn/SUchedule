<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $primaryKey = 'requirement';

    public $timestamps = null;

    public function course()
    {
        return $this->hasOne(Course::class, 'course_code');
    }
}