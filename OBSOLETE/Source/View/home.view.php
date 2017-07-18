<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 21.05.2017
 * Time: 08:57
 */

?>

<!doctype html>
<html lang="en">

<?php insert( "/Source/Modal/header_tag.php", ['title' => 'Home']) ?>

<body class="row">

<?php insert( "/Source/Modal/header.modal.php", ['current_page' => 'home'] ) ?>

<div class="full col center">

    <div class="row container">

        <div class="col page_header center">

            <h1>~ Welcome to BetterWeb Schedules ~</h1>

        </div>

        <div class="col intro_message center">

            <p>

                Tired of creating excel tables to decide which courses you will take?

                <br>
                <br>

                With BetterWeb Schedules you can create as many alternatives as you like in an ease.

                <br>
                <br>

                And why not create a longer plan for further semesters.

                Your Friendly Neighborhood Senior

            </p>

        </div>

        <?php insert( "/Source/Modal/schedule_list.modal.php" , ['mysqli' => $mysqli, 'user_id' => [1]] ) ?>

        <div class="col intro_message center">

            <p>

                Why not create a schedule for yourself! Just go to <a href="<?= __URL_BASE__ ?>create-schedule">+ Schedule</a>.

            </p>

        </div>

        <script>

            $('.schedule .header .like button:not( .liked )').one( 'mousedown', function() {

                $(this).css( "animation", "like 0.3s ease-in-out forwards" );

                $(this).next().text( $(this).next().text()*1 + 1 );

            });

        </script>

    </div>

</div>

</body>
</html>
