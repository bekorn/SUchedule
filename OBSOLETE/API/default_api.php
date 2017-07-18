<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 31.05.2017
 * Time: 16:07
 */

/**
 *
 *
 * @param $message
 */
function return_error( $message ) {

    exit( json_encode([ 'status' => 'error', 'value' => $message ]) );
}

/**
 *
 *
 * @param $message
 */
function return_success( $message ) {

    exit( json_encode([ 'status' => 'success', 'value' => $message ]) );
}


//  Connect to Server

$mysqli = new mysqli("localhost", "root", "", "betterweb");

if( $mysqli->connect_errno ) {

    return_error( "Connection Error -> " . $mysqli->connect_error );
}

if( !$mysqli->set_charset( 'utf8' ) ) {

    return_error( "UTF8 Charset couldn't loaded. Error -> " . $mysqli->error );
}


//  Set Content-Type to JSON

header('Content-Type : application/json');