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
$title;             //  Long name of the corse
$code;              // Generic code of the course
//$description;       //  description       TODO : Add description for courses
$hours;             //  hours of course
$su_credit;         //
$rating;            //
$number_of_ratings; //
$section;           //  nullable
//$section_number;    //  nullable          TODO : Seperating section numbers from section might be handy
$lecturer_name = 'Lecturer';

?>


<div class="col course">

    <div class="full row">

        <div class="col wrap header">

            <div class="is_long">

                <?= $cdn ?>

            </div>

            <div class="name">

                <?= $title . " - " . $code ?>

            </div>

            <div class="term">

                Term : <?= $term ?>

            </div>

            <div class="lecturer">

                <?= $lecturer_name ?>

            </div>

            <div class="rating">

                <button type="button">👍</button>

                <inline>

                    <?= $rating ? $rating : "~" ?>

                </inline>

                <button type="button">👎</button>

            </div>

        </div>

        <div class="col body">

            <?= "Put description here" ?>

        </div>

    </div>

</div>