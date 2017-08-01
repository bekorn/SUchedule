<?php

namespace App\Repositories;

use App\Models\Meeting;

class MeetingRepository extends Repository
{
    public function model()
    {
        return Meeting::class;
    }
}