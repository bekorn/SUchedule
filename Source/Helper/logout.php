<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 21.05.2017
 * Time: 08:46
 */

session_start();

session_unset();

session_destroy();

header("Location: ". $_SERVER['HTTP_REFERER']);