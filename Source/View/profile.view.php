<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 08.05.2017
 * Time: 14:11
 */


/**  Arguments   **/
$user_id;   //  of the user to be displayed

$sql = "SELECT s_id, mail, password, name, surname FROM students WHERE s_id=?";
$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 'i', $user_id  );
$stmt->execute();

$user = $stmt->get_result()->fetch_array( MYSQLI_ASSOC );

$user_found = (count($user)) ? true : false;
$self = false;

if( !empty( $_SESSION['user_id'] )  &&  $user['s_id'] == $_SESSION['user_id'] ) {

    $self = true;
}

if( $user_found ) {

    $sql = "SELECT * FROM `latest_schedules` WHERE s_id=?";
    $stmt = $mysqli->prepare( $sql );
    $stmt->bind_param( 'i', $user['s_id']  );
    $stmt->execute();

    $schedules = $stmt->get_result()->fetch_all( MYSQLI_ASSOC );
}

?>

<!doctype html>
<html lang="en">

<?php insert( "/Source/Modal/header_tag.php", ['title' => 'Profile']) ?>

<body class="row">

<?php insert( "/Source/Modal/header.modal.php" ) ?>

<div class="full col center">

    <div class="row container">

        <div class="col profile_header">

        <?php if( !$user_found ): ?>

            <h1>There is no user with this id.</h1>

        <?php else: ?>

            <img class="profile_picture" src="http://lorempixel.com/120/120/people" alt="profile_picture">

            <h1><?= $user['name'] .' '. $user['surname'] ?></h1>

        <?php endif; ?>

        </div>


        <?php if( $user_found ): ?>

            <div class="row schedule_list">

            <?php

            foreach( $schedules as $schedule ) {

                insert( '/Source/Modal/schedule.modal.php', $schedule );
            }

            ?>

            </div>

        <?php endif; ?>



    </div>

</div>

</body>
</html>
