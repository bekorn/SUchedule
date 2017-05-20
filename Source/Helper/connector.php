<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 08.05.2017
 * Time: 01:22
 */

$mysqli = new mysqli("localhost", "root", "", "betterweb");

if( $mysqli->connect_errno ) {

    echo "Connection Error -> " . $mysqli->connect_error;
    exit();
}

if( !$mysqli->set_charset( 'utf8' ) ) {

    echo "UTF8 Charset couldn't loaded. Error -> " . $mysqli->error;
    exit();
}

return $mysqli;