<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 31.05.2017
 * Time: 16:07
 */

/**
 * Returns a json object with 'Error' : $message if provided
 *
 * @param null $message
 */
function exit_with_error( $message = null ) {

    exit( $message ? json_encode([ 'Error' => $message]) : null );
}



//  Connect to Server
$mysqli = new mysqli("localhost", "root", "", "betterweb");

if( $mysqli->connect_errno ) {

    exit_with_error( "Connection Error -> " . $mysqli->connect_error );
}

if( !$mysqli->set_charset( 'utf8' ) ) {

    exit_with_error( "UTF8 Charset couldn't loaded. Error -> " . $mysqli->error );
}