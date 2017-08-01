<?php

namespace App\Http\Controllers;

use App\Models\PolySchedule;
use App\Repositories\PolyScheduleRepository;
use Illuminate\Http\Request;

class PolyScheduleController extends Controller
{
    protected $poly_schedule_repo;

    function __construct (PolyScheduleRepository $poly_schedule_repository)
    {
        $this->poly_schedule_repo = $poly_schedule_repository;
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
     * @param  \Illuminate\Http\Request  $request
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
     * @internal param PolySchedule $polySchedule
     */
    public function show(int $id)
    {
        return $this->poly_schedule_repo->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolySchedule  $polySchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(PolySchedule $polySchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PolySchedule  $polySchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PolySchedule $polySchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolySchedule  $polySchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(PolySchedule $polySchedule)
    {
        //
    }
}
