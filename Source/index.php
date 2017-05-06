<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 06.05.2017
 * Time: 02:13
 */

$mysqli = new mysqli("localhost", "root", "", "betterweb");

if( $mysqli->connect_errno ) {

    echo $mysqli->connect_error;
}

var_dump( $mysqli );

