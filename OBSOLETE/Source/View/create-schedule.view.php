<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 21.05.2017
 * Time: 17:58
 */

/**     Pre Condtions   **/
$_SESSION['user_id'];   //  User should login to view this page
$_SESSION['user_full_name'];

?>

<!doctype html>
<html lang="en">

<?php insert( "/Source/Modal/header_tag.php", ['title' => 'Create Schedule']) ?>

<body class="row">

<?php insert( "/Source/Modal/header.modal.php", ['current_page' => 'create_schedule']  ) ?>

<div class="full col center">

    <div class="row container">

        <div class="col page_header center">

            <h2>Create A Schedule</h2>

        </div>

        <form id="create_schedule" action="<?=__URL_BASE__?>Source/Helper/create_schedule" method="POST">

            <div class="col schedule">

                <div class="full row">

                    <div class="col wrap header">

                        <div class="is_long">

                            <div class="col">

                                Type :

                                <input type="radio" id="radio_lts" name="is_long" value="1" hidden>
                                <label for="radio_lts">LTS</label>

                                <input type="radio" id="radio_ss" name="is_long" value="0" hidden>
                                <label for="radio_ss">SS</label>

                            </div>

                        </div>

                        <input class="name full" type="text" name="name" placeholder="Name" autocomplete="off" tabindex="1">

                        <div class="date">

                            <?= date("Y-m-d")?>

                        </div>

                        <div class="created_by">

                            <a href="#"><?= $_SESSION['user_full_name']; ?></a>

                        </div>

                        <div class="like">

                            <button type="button">👍</button>

                            <inline>

                                0

                            </inline>

                        </div>

                    </div>

                    <textarea class="col body" rows="6" name="description" placeholder="Write a description for your schedule" autocomplete="off" tabindex="2"></textarea>

                </div>

            </div>

        </form>

        <div class="col center">

            <input form="create_schedule" type="submit" id="form_submit" value="Create Schedule">

        </div>

        <div class="col">

            <?php insert( '/Source/Modal/course_list.modal.php', ['mysqli' => $mysqli] ) ?>

        </div>

    </div>

</div>

</body>
</html>
