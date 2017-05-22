<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 21.05.2017
 * Time: 22:12
 */

$mysqli = include "connector.php";

if( !isset($_POST['is_long'], $_POST['id']) ) {

    echo "olmadı";
    exit();
}

$is_long = $_POST['is_long'];
$id = $_POST['id'];

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

echo json_encode( ['success' => ($stmt->affected_rows ? true : false)] );     //   ? true : false