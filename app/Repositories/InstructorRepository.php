<?php

namespace App\Repositories;

use App\Model\Instructor;

class InstructorRepository extends Repository
{
    public function model()
    {
        return Instructor::class;
    }

}