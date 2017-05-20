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

<?php insert( "/Source/Modals/header_tag.php", ['title' => 'Fresh Schemes']) ?>

<body class="row">

<?php insert( "/Source/Modals/header.modal.php" ) ?>

<div class="col center">

    <div class="row container">

        <?php insert( "/Source/Modals/fresh_schemes.modal.php", ['mysqli' => $mysqli] ) ?>

    </div>

</div>

</body>
</html>
