<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 08.05.2017
 * Time: 13:49
 */

?>

<div class="col center" id="header">

    <div class="row container">

        <div class="col" id="header_menu">

            <a href="<?=__VIEW_LINK__?>home">Home</a>

            <a href="<?=__VIEW_LINK__?>profile">Profile</a>

            <a href="<?=__VIEW_LINK__?>search">Search</a>

            <a href="<?=__VIEW_LINK__?>my_schedule">My Schedule</a>

            <button id="login">Login</button>

            <form class="hidden" action="<?=__VIEW_LINK__?>Helper/login.php" method="POST">

                <button type="submit">Login</button>

            </form>

        </div>

    </div>

</div>