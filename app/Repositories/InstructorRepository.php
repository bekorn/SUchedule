<?php

namespace App\Repositories;

use App\Models\Instructor;

class InstructorRepository extends Repository
{
    public function model()
    {
        return Instructor::class;
    }

}