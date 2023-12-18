<?php

include '../db.php';

$title = $_POST['title'];
$promoter = $_POST['promoter'];
$location = $_POST['location'];
$date_schedule = $_POST['date_schedule'];
$number = $_POST['number'];
$type = $_POST['type'];
$prize = $_POST['prize'];

$length = 10;    
$schedule_code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length).date('Ym');

mysqli_query($con,"INSERT INTO schedule(title,promoter,location,date_schedule,numbers,type,prize,schedule_code) VALUES('$title','$promoter','$location','$date_schedule','$number','$type','$prize','$schedule_code')");

?>