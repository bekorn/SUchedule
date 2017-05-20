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

            <button id="login_form_toggler">Login</button>

            <form class="login_form" action="<?=__VIEW_LINK__?>Helper/login.php" method="POST">

                <label for="username">Username</label>
                <input name="username" id="username" type="text">

                <label for="password">Password</label>
                <input name="password" id="password" type="password">

                <button type="submit">Register</button>

                <script type="text/javascript">

                    $('#login_form_toggler').click( function() {

                        $('.login_form').addClass("active");
                    } );

                    $(document).mousedown( function(event) {

                        if( !$(event.target).closest('.login_form').length ) {

                            $('.login_form').removeClass("active");
                        }
                    });

                </script>

            </form>

        </div>

    </div>

</div>