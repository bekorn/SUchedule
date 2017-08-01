<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\Requirement;

class RequirementRepository extends Repository
{
    public function model()
    {
        return Requirement::class;
    }

//    public function show (int $course_id)
//    {
//        $course = Course::find( $course_id );
//
//        if( empty( $course ) )
//        {
//            throw new \Exception('Course not found');
//        }
//
//        $requirements = $course->required_courses;
//        return $requirements;
//    }
}