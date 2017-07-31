<?php

namespace App\Repositories;

use App\Model\Meeting;

class MeetingRepository extends Repository
{
    public function model()
    {
        return Meeting::class;
    }
}