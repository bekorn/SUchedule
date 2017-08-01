<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends Repository
{
    public function model()
    {
        return Course::class;
    }
}