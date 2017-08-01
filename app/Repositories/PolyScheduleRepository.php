<?php

namespace App\Repositories;

use App\Models\PolySchedule;

class PolyScheduleRepository extends Repository
{
    public function model()
    {
        return PolySchedule::class;
    }
}