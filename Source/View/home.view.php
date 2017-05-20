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

        <?php insert( "/Source/Modal/fresh_schemes.modal.php", ['mysqli' => $mysqli] ) ?>

    </div>

</div>

</body>
</html>
