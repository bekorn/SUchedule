<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 08.05.2017
 * Time: 14:52
 */


//  Global File Path Definitions
define( '__PROJECT_DIR__', 'C:/wamp64/www/betterweb' );

switch( $_SERVER['HTTP_HOST'] ) {

    case 'localhost':
        define( '__URL_BASE__', 'http://localhost/betterweb/');
        define( '__API_BASE__', 'http://localhost/betterweb/API/');
        break;

    case 'betterweb.dev':
        define( '__URL_BASE__', '/');
        define( '__API_BASE__', 'http://betterweb.dev/API/');
        break;

    default:
        define( '__URL_BASE__', '/' );
        define( '__API_BASE__', 'http://'. $_SERVER['HTTP_HOST'] .'/API/' );
}



//  Include another php file with parameters
function insert( $file, $args = [] ) {

    extract( $args );
    return include __PROJECT_DIR__ . $file;
}


//  Connect to server
$mysqli = insert( "/Source/Helper/connector.php" );


//  Parse the Path
$path = parse_url( $_SERVER['REQUEST_URI'] )['path'];
$path = explode( '/', $path );

$path_clear = array_search( 'betterweb', $path );
$path = array_slice( $path,  ($path_clear ? $path_clear : 0) + 1 );


//  Start Session
session_start();


switch( $path[0] ) {

    case '':
    case 'home':
        insert( "/Source/View/home.view.php", ['mysqli' => $mysqli] );
        break;

    case 'fresh':
        insert( "/Source/View/fresh.view.php", ['mysqli' => $mysqli] );
        break;

    case 'profile':
        if( !empty( $path[1] ) ) {

            insert( "/Source/View/profile.view.php", ['mysqli' => $mysqli, 'user_id' => $path[1]] );
            break;
        }
        insert( "/Source/View/404.view.php" );
        break;

    case 'schedule':
        if( !empty( $path[1] ) && ( $path[1] == 's' || $path[1] == 'lt' ) && !empty( $path[2] ) ) {

            insert( "/Source/View/schedule.view.php", ['mysqli' => $mysqli, 'is_long' => ($path[1] == 'lt' ? 1 : 0), 'id' => $path[2]] );
            break;
        }
        insert( "/Source/View/404.view.php" );
        break;

    case 'search':
        insert( "/Source/View/search.view.php", ['mysqli' => $mysqli] );
        break;

    case 'create-schedule':
        insert( "/Source/View/create-schedule.view.php", ['mysqli' => $mysqli] );
        break;

    default:
        insert( "/Source/View/404.view.php" );
}