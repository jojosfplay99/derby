<?php

include '../db.php';

$farm_name = mysqli_escape_string($con,$_POST['farm_name']);
$ownername = mysqli_escape_string($con,$_POST['ownername']);
$address = mysqli_escape_string($con,$_POST['address']);
$contactno = mysqli_escape_string($con,$_POST['contactno']);
$date_registered = $_POST['date_registered'];


mysqli_query($con,"INSERT INTO entry_info (farm_name,ownername,address,contact_number,date_registered) VALUES('$farm_name','$ownername','$address','$contactno','$date_registered')");


?>