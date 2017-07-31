<?php

namespace App\Repositories;

use App\Model\User;

class UserRepository extends Repository
{
    public function model()
    {
        return USer::class;
    }
}