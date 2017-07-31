<?php

namespace App\Repositories;

use App\Model\Course;

class CourseRepository extends Repository
{
    public function model()
    {
        return Course::class;
    }
}