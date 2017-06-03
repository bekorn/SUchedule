<?php
/**
 * Created by PhpStorm.
 * User: Berk
 * Date: 22.05.2017
 * Time: 01:56
 */

/**     Arguments   **/
$is_long;       //  (-1 | 0 | 1 | null) => (none | SS | LTS | all) Schedule Type filter
$schedule_id;   //  [] Schedule filter to pick one
$user_id;       //  [] User filter for id
$user_name;     //  User filter for name or surname
$name;          //  Schedule filter for name
$description;   //  Schedule filter for description
$date;          //  (after) date filter

$is_long = isset( $is_long ) ? $is_long : null;
$schedule_id = isset( $schedule_id ) ? implode(',', $schedule_id) : null;
$user_id = isset( $user_id ) ? implode(',', $user_id) : null;
$user_name = isset( $user_name ) ? $user_name : null;
$name = isset( $name ) ? $name : null;
$description = isset( $description ) ? $description : null;
$date = isset( $date ) ? $date : null;

$query = http_build_query([
    'is_long' => $is_long,
    'schedule_id' => $schedule_id,
    'user_id' => $user_id,
    'user_name' => $user_name,
    'name' => $name,
    'description' => $description,
    'date' => $date,
]);

$schedules = file_get_contents( __API_BASE__.'schedule_list.api.php?'.$query );

$schedules = json_decode($schedules, true);

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

	api.append_like_button_events( $('.schedule .header .like button:not( .liked )') );

</script>

<?php endif; ?>