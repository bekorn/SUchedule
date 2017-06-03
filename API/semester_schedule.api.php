<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 31.05.2017
 * Time: 03:19
 *
 * @api
 *
 * @var int $id ss_id of the semester schedule
 */

include "default_api.php";


if( isset( $_GET['id'] ) ) {

    $id = $_GET['id'];
}
else {

    exit_with_error( "Please give 'id' parameter" );
}


//  Get Schedule Info
$sql = "SELECT * FROM `semester_schedules` WHERE ss_id = ?";
$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 'i', $id );
$stmt->execute();
$schedule = $stmt->get_result()->fetch_assoc();

//  Check if a schedule had found
if( $schedule == null ) {

    exit_with_error( "Please give a valid 'id' value" );
}


//  Get Creator Info
$sql = "SELECT `s_id`, `name`, `surname`, `mail` FROM `students` WHERE s_id = ". $schedule['creator_id'];
$creator = $mysqli->query( $sql )->fetch_assoc();


//  Get Contents
$sql = "SELECT `cdn`, `term` FROM `ss_contains_c` WHERE ss_id = ". $schedule['ss_id'];
$courses = $mysqli->query( $sql )->fetch_all( MYSQLI_ASSOC );


//  Form $result's shape
$result = $schedule;
unset( $result['creator_id'] );

$result['creator'] = $creator;

$result['courses'] = $courses;


//  Return $result
header('Content-Type : application/json');
echo json_encode( $result );