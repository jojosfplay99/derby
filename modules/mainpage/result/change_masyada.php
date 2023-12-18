<?php

include '../db.php';

$id = $_POST['id'];
$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$data3 = $_POST['data3'];

mysqli_query($con,"UPDATE bet_slip SET masyada = '$data1', monton = '$data3' WHERE id = '$id'");

?>