<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 21.05.2017
 * Time: 19:52
 */

/** Arguments   **/
$is_long;        // 0 for ss, 1 for lts
$id;             // int 1
$name;           // string 'First Year Introduction' (length=23)
$description;    // string 'Which courses you should take on your freshman year!' (length=52)
$likes;          // int 34
$created_at;     // string '2017-01-05' (length=10)
$s_id;           // int 17679
$s_name;         // string 'Berke' (length=5)
$s_surname;      // string 'Koçulu' (length=7)

?>


<div class="col schedule">

    <div class="full row">

        <div class="col wrap header">

            <div class="is_long">

                <?php echo ($is_long)? 'LTS' : 'SS'; ?>

            </div>

            <div class="name">

                <a href="<?=__VIEW_LINK__?>schedule/<?= ($is_long ? 'lt' : 's') ?>/<?= $id ?>"><?= $name ?></a>

            </div>

            <div class="date">

                <?= $created_at ?>

            </div>

            <div class="created_by">

                <a href="<?= __VIEW_LINK__ ?>profile/<?= $s_id ?>"><?= $s_name ." ". $s_surname ?></a>

            </div>

            <div class="like">

                <button type="button" data-id="<?= $id ?>" data-is_long="<?= $is_long ?>">👍</button>

                <inline>

                    <?= $likes ?>

                </inline>

            </div>

        </div>

        <div class="col body">

            <?= $description ?>

        </div>

    </div>

</div>