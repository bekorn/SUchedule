<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 24.05.2017
 * Time: 04:44
 */

/**     Arguments   **/
$course_key;    //  [] Course ID filter (has two column: cdn, term)
$instructor_id; //  [] Instructor ID filter
$hours;         //  Filter for hours
$credit;        //  Filter for credit
$rating;        //  (bottom limit) Filter for rating

if( !isset($course_key) || empty($course_key) ) {

    $course_key = '(cdn, term)';
}
else {

    $course_key = implode( ', ', array_map( function($course){ return '('. implode( ',', $course ) .')';}, $course_key) );
}

if( !isset($instructor_id) || empty($instructor_id) ) {

    $instructor_id = 's_id';
}
else {

    $instructor_id = "'". implode( "','", $instructor_id) ."'";
}

if( !isset($hours) ) {

    $hours = null;
}

if( !isset($credit) ) {

    $credit = null;
}

if( !isset($rating) ) {

    $rating = null;
}

$sql = "SELECT * FROM `courses` 
WHERE (cdn, term) IN ( ". $course_key ." ) 
AND hours = COALESCE(?, hours) 
AND credit = COALESCE(?, credit) ";

$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 'ii', $hours, $credit );
$stmt->execute();

$courses = $stmt->get_result()->fetch_all( MYSQLI_ASSOC );

?>


<div class="full row schedule_list">

    <?php

    if( count($courses) ) {

        foreach( $courses as $course ) {

            insert( '/Source/Modal/course.modal.php', $course );
        }
    }
    else {

        echo "<i>No Courses Found...</i>";
    }

    ?>

</div>