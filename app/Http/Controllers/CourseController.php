<?php

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $course_repo;

    public function __construct (CourseRepository $course_repository)
    {
        $this->course_repo = $course_repository;
    }

    public function show (int $id)
    {
        return $this->course_repo->find($id);
    }

    public function index ()
    {
        return $this->course_repo->all();
    }
}
