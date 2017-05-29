<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 29.05.2017
 * Time: 01:31
 */

/**     Arguments   **/
$is_long;            //  SS or LTS filter
$schedule_id;        //  [M] Schedule filter to pick one
$user_id;            //  [M] User filter for id
$user_name;          //  User filter for name or surname
$name;               //  Schedule filter for name
$description;        //  Schedule filter for description
$date;               //  (after) date filter
//  [M] : Can take multiple values separated by commas

$mysqli = include "connector.php";

$is_long = isset( $_GET['is_long'] ) ? $_GET['is_long'] : null;

$schedule_id = isset( $_GET['$schedule_id'] ) ? "'".$_GET['$schedule_id']."'" : 'id';

$user_id = isset( $_GET['user_id'] ) ? "'".$_GET['user_id']."'" : 's_id';

$user_name = isset( $_GET['user_name'] ) ? $_GET['user_name'] : null;
$user_name = '%'. $user_name .'%';

$name = isset( $_GET['name'] ) ? $_GET['name'] : null;
$name = '%'. $name .'%';

$description = isset( $_GET['description'] ) ? $_GET['description'] : null;
$description = '%'. $description .'%';

$date = isset( $_GET['date'] ) ? $_GET['date'] : null;

//var_dump( $_GET );
//
//var_dump( $is_long );
//var_dump( $schedule_id );
//var_dump( $user_id );
//var_dump( $user_name );
//var_dump( $name );
//var_dump( $description );
//var_dump( $date );

$sql = "SELECT * FROM `latest_schedules` 
WHERE is_long=COALESCE(?, is_long)
AND id IN ( ". $schedule_id ." )
AND s_id IN ( ". $user_id ." ) 
AND ( s_name LIKE ? OR s_surname LIKE ? ) 
AND (name LIKE ?)
AND (description LIKE ? ) 
AND created_at<=COALESCE(?, created_at)";
$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 'isssss', $is_long, $user_name, $user_name, $name, $description, $date  );
$stmt->execute();

$schedules = $stmt->get_result()->fetch_all( MYSQLI_ASSOC );

header('Content-Type : application/json');
echo json_encode($schedules);