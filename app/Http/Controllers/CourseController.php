<?php

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $course_repo;

    public function __construct(CourseRepository $course_repository)
    {
        $this->course_repo = $course_repository;
    }

    public function show(int $id)
    {
        return $this->course_repo->find($id);
    }

    public function index()
    {
        $courses = $this->course_repo->with('instructors', 'meetings', 'requirements')->paginate(12);
        return view('courses.index', ['courses' => $courses]);
    }
}
