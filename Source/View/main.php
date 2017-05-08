<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 06.05.2017
 * Time: 02:13
 */

$mysqli = include __PROJECT_DIR__ . "/Source/Helpers/connector.php";

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?=__PROJECT_DIR__?>/Source/Style/Compiled/style.css">

    <title>Fresh Schemes</title>
</head>
<body>

    <?php include __PROJECT_DIR__ . "/Source/Modals/header.modal.php" ?>

    <?php include __PROJECT_DIR__ . "/Source/Modals/fresh_schemes.modal.php" ?>

</body>
</html>
