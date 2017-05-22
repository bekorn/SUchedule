<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 20.05.2017
 * Time: 04:27
 */

$mysqli = include "connector.php";

function return_back ( $message = "" ) {

    if( $message == "" ) {

        die( "<script>window.history.go(-1);</script>" );
    }
    else {

        die( "<script> alert( '$message' ); window.history.go(-1);</script>" );
    }

}


if( empty($_POST['mail']) || empty($_POST['password']) ) {

    return_back (  "Please enter e-mail and password" );
}

$mail = $_POST['mail'];
$password = $_POST['password'];

//  Email Varification
if( explode( '@', $mail)[1] != 'sabanciuniv.edu' ) {

    return_back (  'Please enter a Sabancı University mail to login' );
}

$sql = "SELECT s_id, mail, password, name, surname FROM students WHERE mail=?";
$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 's', $mail  );
$stmt->execute();

$result = $stmt->get_result()->fetch_array();

if( count($result) && password_verify( $password, $result['password'] ) ) {

    session_start();
    $_SESSION['user_id'] = $result['s_id'];
    $_SESSION['user_full_name'] = $result['name'] ." ". $result['surname'];

//    header("Location: ". $_SERVER['HTTP_REFERER']);
    return_back ();
}
else {

    return_back (  'Wrong e-mail or password' );
}