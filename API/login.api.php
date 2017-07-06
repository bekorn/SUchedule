<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 20.05.2017
 * Time: 04:27
 */

include "default_api.php";

if( empty($_POST['mail']) || empty($_POST['password']) ) {

    return_error( 'Please enter e-mail and password' );
}

$mail = $_POST['mail'];
$password = $_POST['password'];

//  Email Verification
if( explode( '@', $mail)[1] != 'sabanciuniv.edu' ) {

    return_error(  'Please enter a Sabancı University mail to login' );
}


//  Get User
$sql = "SELECT s_id, mail, password, name, surname FROM students WHERE mail=?";
$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 's', $mail  );
$stmt->execute();
$user = $stmt->get_result()->fetch_array();


//  Check Password
if( count($user) && password_verify( $password, $user['password'] ) ) {

    session_start();
    $_SESSION['user_id'] = $user['s_id'];
    $_SESSION['user_full_name'] = $user['name'] ." ". $user['surname'];

    unset( $user['password'] );

    return_success( $user );
}
else {

    return_error(  'Wrong e-mail or password' );
}