<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 08.05.2017
 * Time: 01:22
 */

$mysqli = new mysqli("localhost", "root", "", "betterweb");

if( $mysqli->connect_errno ) {

    exit( "Connection Error -> " . $mysqli->connect_error );
}

if( !$mysqli->set_charset( 'utf8' ) ) {

    exit( "UTF8 Charset couldn't loaded. Error -> " . $mysqli->error );
}

return $mysqli;