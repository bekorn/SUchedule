<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 20.05.2017
 * Time: 04:27
 */

$mysqli = include "connector.php";

session_start();

if( empty($_POST['mail']) && empty($_POST['password']) ) {

    die( "Please enter e-mail and password" );
}

$mail = $_POST['mail'];
$password = $_POST['password'];

//  Email Varification
if( explode( '@', $mail)[1] != 'sabanciuniv.edu' ) {

    die( "Please enter a Sabancı University mail to login" );
}

$sql = "SELECT s_id, mail, password FROM students WHERE mail=?";
$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 's', $mail  );
$stmt->execute();

$result = $stmt->get_result()->fetch_array();

var_dump( $result );

if( count($result) && password_verify( $password, $result['password'] ) ) {

    $_SESSION['user_id'] = $result['s_id'];
    header("Location: ". $_SERVER['HTTP_REFERER']);
//    die( 'Login Successful' );
}
else {

    die( 'Wrong e-mail or password' );
}

?>
