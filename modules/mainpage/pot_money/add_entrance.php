<?php

include '../db.php';

$entrance_num = strtoupper($_POST['entrance_num']);
$date_today = $_POST['date_today'];

mysqli_query($con,"INSERT INTO entrance(entrance_num, date_created) VALUES('$entrance_num','$date_today')");


?>