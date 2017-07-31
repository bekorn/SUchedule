<?php

namespace App\Http\Controllers;

use App\Repositories\InstructorRepository;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    protected $instructor_repo;

    function __construct(InstructorRepository $instructor_repository)
    {
        $this->instructor_repo = $instructor_repository;
    }

}
