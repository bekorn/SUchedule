<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 08.05.2017
 * Time: 14:52
 */

//  Global File Path Definitions
define( '__PROJECT_DIR__', 'C:/wamp64/www/betterweb' );
define( '__LINK_DIR__', '/betterweb/Source' );

//  Include another php file with parameters
function insert( $file, $args = [] ) {

    extract( $args );
    return include __PROJECT_DIR__ . $file;
}


//  Connect to server
$mysqli = insert( "/Source/Helpers/connector.php" );


//  Parse the Path
$path = parse_url( $_SERVER['REQUEST_URI'] )['path'];
$path = array_slice( explode( '/', $path ), 4 );

//var_dump( $path );

switch( $path[0] ) {

    case '':
    case 'index.php':
    case 'home':
        include __PROJECT_DIR__ . "/Source/View/home.php";
        break;
    case 'profile':
        include __PROJECT_DIR__ . "/Source/View/profile.php";
        break;
    case 'search':
        include __PROJECT_DIR__ . "/Source/View/search.php";
        break;
    case 'my_schedule':
        include __PROJECT_DIR__ . "/Source/View/in_development.php";
        break;
    default:
        include __PROJECT_DIR__ . "/Source/View/404.php";
}