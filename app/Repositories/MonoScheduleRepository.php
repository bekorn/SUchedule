<?php

namespace App\Repositories;

use App\Models\MonoSchedule;

class MonoScheduleRepository extends Repository
{
    public function model()
    {
        return MonoSchedule::class;
    }
}