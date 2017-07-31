<?php

namespace App\Repositories;

use App\Model\MonoSchedule;

class MonoScheduleRepository extends Repository
{
    public function model()
    {
        return MonoSchedule::class;
    }
}