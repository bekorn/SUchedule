<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 09.05.2017
 * Time: 17:40
 */

$user_name = null;
$name = null;
$is_long = null;
$description = null;
$date = null;

if( isset($_POST['user_name']) && $_POST['user_name'] != "" ) {

    $user_name = $_POST['user_name'];
}

if( isset($_POST['name']) && $_POST['name'] != "" ) {

    $name = $_POST['name'];
}

if( isset($_POST['description']) && $_POST['description'] != "" ) {

    $description = $_POST['description'];
}

if( isset($_POST['ss']) && isset($_POST['lts']) ) {

    $is_long = null;
}
elseif( isset($_POST['ss']) ) {

    $is_long = 0;
}
elseif( isset($_POST['lts']) ) {

    $is_long = 1;
}
else {

    $is_long = -1;
}

?>

<!doctype html>
<html lang="en">

<?php insert( "/Source/Modal/header_tag.php", ['title' => 'Search']) ?>

<body class="row">

<?php insert( "/Source/Modal/header.modal.php", ['current_page' => 'search']  ) ?>

<div class="full col center">

    <div class="row container">

        <div class="col">

            <form class="search_form" action="<?=__URL_BASE__?>search" method="POST">

                <label for="user_name">User Name</label>
                <input name="user_name" id="user_name" type="text" value="<?=( isset($_POST['user_name']) ) ? $_POST['user_name'] : ""?>">

                <label for="name">Schedule Name</label>
                <input name="name" id="name" type="text" value="<?=( isset($_POST['name']) ) ? $_POST['name'] : ""?>">

                <label for="description">Schedule Description</label>
                <input name="description" id="description" type="text" value="<?=( isset($_POST['description']) ) ? $_POST['description'] : ""?>">

                <label for="lts">LTS</label>
                <input type="checkbox" id="lts" name="lts" <?=( $_SERVER['REQUEST_METHOD'] != 'POST' || isset($_POST['lts']) ) ? "checked" : ""?> >

                <label for="ss">SS</label>
                <input type="checkbox" id="ss" name="ss" <?=( $_SERVER['REQUEST_METHOD'] != 'POST' || isset($_POST['ss']) ) ? "checked" : ""?> >


                <input type="submit" value="Search">

            </form>

        </div>

        <?php $filters = ['user_name' => $user_name, 'name' => $name, 'description' => $description, 'is_long' => $is_long, 'date' => $date] ?>
        <?php insert( "/Source/Modal/schedule_list.modal.php" , ['mysqli' => $mysqli] + $filters ) ?>

    </div>

</div>

</body>
</html>
