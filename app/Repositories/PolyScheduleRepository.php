<?php

namespace App\Repositories;

use App\Model\PolySchedule;

class PolyScheduleRepository extends Repository
{
    public function model()
    {
        return PolySchedule::class;
    }
}