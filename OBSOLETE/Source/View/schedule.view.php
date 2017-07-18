<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 24.05.2017
 * Time: 01:18
 */

/** Arguments   **/
$is_long;   //  ( lt | s ) path value
$id;        //  id of the schedule

$sql = "SELECT * FROM `latest_schedules` WHERE is_long=? AND id=?";
$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 'ii', $is_long, $id  );
$stmt->execute();

$schedule = $stmt->get_result()->fetch_array( MYSQLI_ASSOC );

if( $schedule ) {

    if( $schedule['is_long'] ) {

        $sql = "SELECT ss_id FROM `lts_contains_ss` WHERE lts_id=?";
    }
    else {

        $sql = "SELECT cdn, term FROM `ss_contains_c` WHERE ss_id=?";
    }

    $stmt = $mysqli->prepare( $sql );
    $stmt->bind_param( 'i', $id  );
    $stmt->execute();

    $contains = $stmt->get_result()->fetch_all( MYSQLI_ASSOC );
}

?>

<!doctype html>
<html lang="en">

<?php insert( "/Source/Modal/header_tag.php", ['title' => $schedule['name']]) ?>

<body class="row">

<?php insert( "/Source/Modal/header.modal.php" ) ?>

<div class="full col center">

    <div class="row container">

        <div class="col page_header center">

            <h1>~ Schedules ~</h1>

        </div>

        <?php

        if( $schedule ) {

            if( $schedule['is_long'] ) {

                //  Show Long Term Schedule
                echo "<h2>Long Term Schedule</h2>";
                insert( "/Source/Modal/schedule_list.modal.php" , ['mysqli' => $mysqli, 'is_long' => 1, 'schedule_id' => [$schedule['id']]]);

                //  Show what it contains
                echo "<h2>Semester Schedules It Has</h2>";
                insert( "/Source/Modal/schedule_list.modal.php" , ['mysqli' => $mysqli, 'is_long' => 0, 'schedule_id' => array_column($contains, 'ss_id')]);
            }
            else {

                //  Show Semester Schedule
                echo "<h2>Semester Schedule</h2>";
                insert( "/Source/Modal/schedule_list.modal.php" , ['mysqli' => $mysqli, 'is_long' => 0, 'schedule_id' => [$schedule['id']]]);

                //  Show what it contains
                echo "<h2>Courses It Has</h2>";
                insert( '/Source/Modal/course_list.modal.php', ['mysqli' => $mysqli, 'course_key' => $contains] );
            }
        }
        else {

            echo "No scheules found with this id";
        }

        ?>

    </div>

</div>

</body>
</html>
