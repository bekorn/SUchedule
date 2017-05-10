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

<div class="col">

    <div class="row">

        <h2>Latest Schedules</h2>

        <div class="schedule_list">

            <?php if( $result != NULL ) : ?>

                <?php while( $row = $result->fetch_assoc() ) : ?>

                    <div>

                    <?php foreach( $row as $key => $val ) : ?>

                        <?php switch( $key ) {

                            case 'is_long' :
                                if( $val ) {
                                    echo "LTS :";
                                }
                                else {
                                    echo "SS :";
                                }
                                break;
                            case 's_id' :
                            case 'id' :
                                break;
                            case "name" :
                                echo "<b>{$val}</b> <br>";
                                break;
                            default :
                                echo $val;
                        }
                        ?>

                    <?php endforeach; ?>

                    </div>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>

    </div>

</div>