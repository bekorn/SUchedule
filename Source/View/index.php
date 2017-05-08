<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 08.05.2017
 * Time: 14:52
 */

define( '__PROJECT_DIR__', 'C:/wamp64/www/betterweb' );
define( '__LINK_DIR__', '/betterweb/Source/View' );


//  Routing will be done here

$path = parse_url( $_SERVER['REQUEST_URI'] )['path'];
$path = explode( '/', $path );

//var_dump( $path );

switch( $path[4] ) {

    case '':
    case 'index.php':
    case 'main.php':
        include __PROJECT_DIR__ . "/Source/View/main.php";
        break;
    case 'profile.php':
        include __PROJECT_DIR__ . "/Source/View/profile.php";
        break;
    case 'schedules.php':
        include __PROJECT_DIR__ . "/Source/View/in_development.php";
        break;
    case 'my_schedule.php':
        include __PROJECT_DIR__ . "/Source/View/in_development.php";
        break;
    default:
        include __PROJECT_DIR__ . "/Source/View/404.php";
}