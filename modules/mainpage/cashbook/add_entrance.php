<?php

include '../db.php';

$entrance_num = strtoupper($_POST['entrance_num']);
$date_today = $_POST['date_today'];
$status = $_POST['status'];

mysqli_query($con,"INSERT INTO entrance(entrance_num, date_created,raffle_status,status) VALUES('$entrance_num','$date_today',null,'$status')");


?>