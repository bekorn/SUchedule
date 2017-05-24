<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 23.05.2017
 * Time: 23:00
 */

session_start();

$mysqli = include "connector.php";

function return_back ( $message = "" ) {

    if( $message == "" ) {

        die( "<script>window.history.go(-1);</script>" );
    }
    else {

        die( "<script> alert( '$message' ); window.history.go(-1);</script>" );
    }
}

var_dump( $_POST );

if( !isset($_SESSION['user_id']) ) {

    return_back( "You must login to create a schedule" );
}

if( !isset($_POST['is_long']) || empty($_POST['name']) || empty($_POST['description']) ) {

    return_back( "Please fill the form correctly" );
}

$user_id = $_SESSION['user_id'];
$is_long = $_POST['is_long'];
$name = $_POST['name'];
$description = $_POST['description'];

if( $_POST['is_long'] ) {

    $sql = "INSERT INTO `long_term_schedules`( `creator_id`, `name`, `description`) VALUES ( ?, ?, ? )";
}
else {

    $sql = "INSERT INTO `semester_schedules`( `creator_id`, `name`, `description`) VALUES ( ?, ?, ? )";
}

$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 'iss', $user_id, $name, $description  );
$stmt->execute();

if( $stmt->affected_rows ) {

    header( "Location: /betterweb/profile/". $_SESSION['user_id'] );
}
else {

    return_back( "Error : ". $stmt->errno ." = ". $stmt->error );
}