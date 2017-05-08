<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 08.05.2017
 * Time: 01:16
 */


$sql = 'SELECT *
        FROM latest_schedules';
$result = $mysqli->query( $sql );

?>


<ul>

    <?php if( $result != NULL ) : ?>

        <?php while( $row = $result->fetch_assoc() ) : ?>

            <li>

            <?php foreach( $row as $key => $val ) : ?>

                <?php if( $key != 's_id' ) : ?>
                    <?=$val?>
                <?php endif; ?>

            <?php endforeach; ?>

            </li>

        <?php endwhile; ?>

    <?php endif; ?>

</ul>