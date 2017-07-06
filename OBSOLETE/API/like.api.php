<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 21.05.2017
 * Time: 22:12
 */

include "default_api.php";

if( !isset($_POST['is_long'], $_POST['id']) ) {

    exit( json_encode( ['error' => 'Insufficient parameters'] ) );
}

$is_long = (int) $_POST['is_long'];
$id = (int) $_POST['id'];

if( $is_long == 0 ) {

    $sql = "UPDATE semester_schedules SET likes=likes+1 WHERE ss_id=?";
}
elseif( $is_long == 1  ) {

    $sql = "UPDATE long_term_schedules SET likes=likes+1 WHERE lts_id=?";
}

$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 'i', $id  );
$stmt->execute();

header('Content-Type : application/json');

$result['is_long'] = $is_long;
$result['id'] = $id;
$result['success'] = ($stmt->affected_rows ? true : false);

exit( json_encode( $result ) );