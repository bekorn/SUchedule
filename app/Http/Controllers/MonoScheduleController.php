<?php

namespace App\Http\Controllers;

use App\Models\MonoSchedule;
use App\Repositories\MonoScheduleRepository;
use Illuminate\Http\Request;

class MonoScheduleController extends Controller
{
    protected $mono_schedule_repo;

    function __construct(MonoScheduleRepository $mono_schedule_repository)
    {
        $this->mono_schedule_repo = $mono_schedule_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @internal param MonoSchedule $mono_schedule
     */
    public function show(int $id)
    {
        return $this->mono_schedule_repo->with('users_liked', 'courses')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonoSchedule $mono_schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Models\MonoSchedule $mono_schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\MonoSchedule $mono_schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Models\MonoSchedule $mono_schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonoSchedule $mono_schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonoSchedule $mono_schedule)
    {
        //
    }
}
