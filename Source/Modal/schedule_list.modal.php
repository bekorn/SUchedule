<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 22.05.2017
 * Time: 01:56
 */

/**     Arguments   **/
$is_long;       //  SS or LTS filter
$id;            //  [] Schedule filter to pick one
$user_id;       //  [] User filter for id
$user_name;     //  User filter for name or surname
$name;          //  Schedule filter for name
$description;   //  Schedule filter for description
$date;          //  (after) date filter

if( !isset($is_long) ) {

    $is_long = null;
}

if( !isset($id) || empty($id) ) {

    $id = 'id';
}
else {

    $id = "'". implode( "','", $id) ."'";
}

if( !isset($user_id) || empty($user_id) ) {

    $user_id = 's_id';
}
else {

    $user_id = "'". implode( "','", $user_id) ."'";
}

if( !isset($user_name) ) {

    $user_name = null;
}

$user_name = '%'. $user_name .'%';

if( !isset($name) ) {

    $name = null;
}

$name = '%'. $name .'%';

if( !isset($description) ) {

    $description = null;
}

$description = '%'. $description .'%';

if( !isset($date) ) {

    $date = null;
}

$sql = "SELECT * FROM `latest_schedules` 
WHERE is_long=COALESCE(?, is_long)
AND id IN ( ". $id ." )
AND s_id IN ( ". $user_id ." ) 
AND ( s_name LIKE ? OR s_surname LIKE ? ) 
AND (name LIKE ?) AND (description LIKE ? ) 
AND created_at<=COALESCE(?, created_at)";

$stmt = $mysqli->prepare( $sql );
$stmt->bind_param( 'isssss', $is_long, $user_name, $user_name, $name, $description, $date  );
$stmt->execute();

$schedules = $stmt->get_result()->fetch_all( MYSQLI_ASSOC );

?>


<div class="row schedule_list">

<?php

if( count($schedules) ) {

    foreach( $schedules as $schedule ) {

        insert( '/Source/Modal/schedule.modal.php', $schedule );
    }
}
else {

    echo "<i>No Schedules Found...</i>";
}

?>

</div>


<!--  Script for liking, not available without login    -->

<?php if( isset( $_SESSION['user_id'] ) ): ?>

<script>

    $('.schedule .header .like button:not( .liked )').one( 'mousedown', function() {

        var like_counter = $(this).next();

        $(this).css( "animation", "like 0.3s ease-in-out forwards" );

        $.ajax({
            type: 'POST',
            url: "<?=__URL_BASE__?>Source/Helper/like" ,
            data: { is_long : $(this).data("is_long"), id : $(this).data("id") }
        }).done( function( data ) {

            data = JSON.parse( data );
            console.log( data );

            if( data.success ) {

                like_counter.text( like_counter.text()*1 + 1 );
            }
        });

    });

</script>

<?php endif; ?>