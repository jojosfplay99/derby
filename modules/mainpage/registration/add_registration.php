<?php

include '../db.php';

$farm_name = mysqli_escape_string($con,$_POST['farm_name']);
$ownername = mysqli_escape_string($con,$_POST['ownername']);
$address = mysqli_escape_string($con,$_POST['address']);
$contactno = mysqli_escape_string($con,$_POST['contactno']);
$date_registered = $_POST['date_registered'];

$registration_number = date('Ymdhis');

mysqli_query($con,"INSERT INTO registration (farm_name,ownername,address,contact_number,date_registered,regno) VALUES('$farm_name','$ownername','$address','$contactno','$date_registered','$registration_number')");


?>