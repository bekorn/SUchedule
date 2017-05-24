<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 24.05.2017
 * Time: 12:35
 */

/** Arguments   **/
$cdn;               //  CDN of course
$term;              //  term of course
$description;       //  description
$hours;             //  hours of course
$credit;            //
$rating;            //  rating
$number_of_ratings; //  amount of rating
$section;           //  nullable
$section_number;    //  nullable
$lecturer_name = 'Lecturer';

?>


<div class="col course">

    <div class="full row">

        <div class="col wrap header">

            <div class="is_long">

                <?= $cdn ?>

            </div>

            <div class="name">

                <?= $description ?>

            </div>

            <div class="term">

                Term : <?= $term ?>

            </div>

            <div class="lecturer">

                <?= $lecturer_name ?>

            </div>

            <div class="rating">

                <button type="button"">👍</button>

                <inline>

                    <?= $rating ?>

                </inline>

                <button type="button"">👎</button>

            </div>

        </div>

        <div class="col body">

            <?= $description ?>

        </div>

    </div>

</div>