<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 31.07.2017
 * Time: 18:49
 */

namespace App\Repositories;


use App\Model\Review;

class ReviewRepository extends Repository
{
    public function model()
    {
        return Review::class;
    }
}