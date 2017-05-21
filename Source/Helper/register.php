<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 21.05.2017
 * Time: 05:03
 */

$mysqli = include "connector.php";

if( empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['mail']) || empty($_POST['student_number']) || empty($_POST['password']) ) {

    die( "Please enter all the required information" );
}

$student_number = $_POST['student_number'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$mail = $_POST['mail'];
$password = password_hash( $_POST['password'], PASSWORD_BCRYPT );

//  Email Varification
if( explode( '@', $mail)[1] != 'sabanciuniv.edu' ) {

    die( "You should have a Sabancı University mail to register" );
}

$sql = "INSERT INTO students (s_id, name, surname, mail, password) VALUES (?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 'issss', $student_number, $name, $surname, $mail, $password  );


if( $stmt->execute() ) {

    die( 'User successfully added' );
}
else {

//    var_dump( $stmt );    TODO: Show proper error messages
    die( "Error occurred : ". $stmt->error );
}


?>