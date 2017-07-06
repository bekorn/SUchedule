<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 21.05.2017
 * Time: 08:46
 */

include "default_api.php";

session_start();

session_unset();

session_destroy();

return_success( 'Logged Out' );