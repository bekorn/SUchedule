<?php

namespace App\Http\Controllers;

use App\Repositories\RequirementRepository;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    protected $requirement_repo;

    public function __construct (RequirementRepository $requirement_repository)
    {
        $this->requirement_repo = $requirement_repository;
    }

    public function show (int $course_id)
    {
        return $this->requirement_repo->show($course_id);
    }
}
