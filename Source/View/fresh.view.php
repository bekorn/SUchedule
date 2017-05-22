<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 06.05.2017
 * Time: 02:13
 */

?>

<!doctype html>
<html lang="en">

<?php insert( "/Source/Modal/header_tag.php", ['title' => 'Fresh Schemes']) ?>

<body class="row">

<?php insert( "/Source/Modal/header.modal.php" ) ?>

<div class="full col center">

    <div class="row container">

        <div class="col page_header center">

            <h1>~ Freshest Schedules ~</h1>

        </div>

        <?php insert( "/Source/Modal/schedule_list.modal.php" , ['mysqli' => $mysqli]) ?>

    </div>

</div>

</body>
</html>
