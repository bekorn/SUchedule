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
define( '__VIEW_LINK__', '/betterweb/');

//  Include another php file with parameters
function insert( $file, $args = [] ) {

    extract( $args );
    return include __PROJECT_DIR__ . $file;
}


//  Connect to server
$mysqli = insert( "/Source/Helper/connector.php" );


//  Parse the Path
$path = parse_url( $_SERVER['REQUEST_URI'] )['path'];
$path = array_slice( explode( '/', $path ), 2 );

//var_dump( $path );


switch( $path[0] ) {

    case '':
    case 'home':
        insert( "/Source/View/home.view.php", ['mysqli' => $mysqli] );
        break;
    case 'fresh':
        insert( "/Source/View/fresh.view.php", ['mysqli' => $mysqli] );
        break;
    case 'profile':
        insert( "/Source/View/profile.view.php", ['mysqli' => $mysqli] );
        break;
    case 'search':
        insert( "/Source/View/search.view.php", ['mysqli' => $mysqli] );
        break;
    case 'my_schedule':
        insert( "/Source/View/in_development.view.php", ['mysqli' => $mysqli] );
        break;
    default:
        insert( "/Source/View/404.view.php" );
}