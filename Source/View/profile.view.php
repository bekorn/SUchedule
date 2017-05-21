<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 08.05.2017
 * Time: 14:11
 */


/**  Arguments   **/
$user_id;   //  of the user to be displayed

$sql = "SELECT s_id, mail, password, name, surname FROM students WHERE s_id=?";
$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 's', $user_id  );
$stmt->execute();

$user = $stmt->get_result()->fetch_array();

?>

<!doctype html>
<html lang="en">

<?php insert( "/Source/Modal/header_tag.php", ['title' => 'Profile']) ?>

<body class="row">

<?php insert( "/Source/Modal/header.modal.php" ) ?>

<div class="full col center">

    <div class="row container">

        <?php if( !count($user) ): ?>

            <h1>There is no user with this id.</h1>

        <?php elseif( !empty( $_SESSION['user_id'] )  &&  $user['s_id'] == $_SESSION['user_id'] ): ?>

            <h1>Welcome to your Profile Page</h1>

        <?php else: ?>

            <h1>This is <?= $user['name'] ?>'s Profile Page</h1>

        <?php endif; ?>

    </div>

</div>

</body>
</html>
