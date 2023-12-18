<?php

include '../db.php';

$scheduled_id = $_POST['scheduled_id'];
$date_schedule = $_POST['date_schedule'];

mysqli_query($con,"UPDATE schedule SET date_schedule = '$date_schedule' WHERE id = '$scheduled_id'");

?>