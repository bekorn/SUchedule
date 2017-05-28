<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 08.05.2017
 * Time: 13:49
 */

/** Arguments **/
$current_page;  //  Current page name to highlight the button
//  available values: null | home | fresh | search | create_schedule | profile

?>

<div class="col center" id="header">

    <div class="row container">

        <div class="col" id="header_menu">

            <a id="header_home" href="<?=__URL_BASE__?>home"><h3>BetterWeb</h3></a>

            <a id="header_fresh" href="<?=__URL_BASE__?>fresh">Fresh</a>

            <a id="header_search" class="menu_divider" href="<?=__URL_BASE__?>search">Search</a>

            <?php if( empty($_SESSION['user_id']) ): ?>

                <button id="login_form_toggler" class="on_right" type="button">Login</button>

                <!--    Login Form      -->

                <form class="login_form" action="<?=__URL_BASE__?>Source/Helper/login" method="POST">

                    <button id="register_form_toggler" type="button">Not a Member Yet?</button>

                    <label for="mail">E-Mail</label>
                    <input name="mail" id="mail" type="email">

                    <label for="password">Password</label>
                    <input name="password" id="password" type="password">

                    <input type="submit" value="Login">

                </form>

                <!--    Register Form      -->

                <form class="register_form" action="<?=__URL_BASE__?>Source/Helper/register" method="POST">

                    <label for="name">First Name</label>
                    <input name="name" id="name" type="text">

                    <label for="surname">Second Name</label>
                    <input name="surname" id="surname" type="text">

                    <label for="mail">E-Mail</label>
                    <input name="mail" id="mail" type="email">

                    <label for="student_number">student_number</label>
                    <input name="student_number" id="student_number" type="number">

                    <label for="password">Password</label>
                    <input name="password" id="password" type="password">

                    <input type="submit" value="Register">

                </form>

                <script type="text/javascript">

                    //  Login and Register forms' handlers

                    $('#login_form_toggler').click( function() {

                        $('.login_form').addClass("active");
                    } );

                    $(document).mousedown( function(event) {

                        if( !$(event.target).closest('.login_form').length ) {

                            $('.login_form').removeClass("active");
                        }
                    });

                    $('#register_form_toggler').click( function() {

                        $('.register_form').addClass("active");
                    } );

                    $(document).mousedown( function(event) {

                        if( !$(event.target).closest('.register_form').length ) {

                            $('.register_form').removeClass("active");
                        }
                    });

                </script>

            <?php else: ?>

                <a id="header_create_schedule" class="on_right" href="<?=__URL_BASE__?>create-schedule">+ Schedule</a>

                <a id="header_profile" href="<?=__URL_BASE__?>profile/<?= $_SESSION['user_id'] ?>">Profile</a>

                <a href="<?=__URL_BASE__?>Source/Helper/logout">Log Out</a>

            <?php endif ?>

        </div>

        <?php if( $current_page ): ?>

        <script>

            //  Header button highlighter for the current page
            $('#header_<?=$current_page?>').addClass('active');

        </script>

        <?php endif; ?>

    </div>

</div>