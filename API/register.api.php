<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 21.05.2017
 * Time: 05:03
 */

include "default_api.php";



if( empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['mail']) || empty($_POST['student_number']) || empty($_POST['password']) ) {

    return_error( 'Please enter all the required information' );
}

$student_number = $_POST['student_number'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$mail = $_POST['mail'];
$password = password_hash( $_POST['password'], PASSWORD_BCRYPT );

//  Email Varification
if( explode( '@', $mail)[1] != 'sabanciuniv.edu' ) {

    return_error( 'You should have a Sabancı University mail to register' );
}

$sql = "INSERT INTO students (s_id, name, surname, mail, password) VALUES (?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 'issss', $student_number, $name, $surname, $mail, $password  );


if( $stmt->execute() ) {

    session_start();
    $_SESSION['user_id'] = $student_number;
    $_SESSION['user_full_name'] = $name ." ". $surname;
    
    return_success( 'Successfully Registered' );
}
else {

    return_error( $stmt->error );
}