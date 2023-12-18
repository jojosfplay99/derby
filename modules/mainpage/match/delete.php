<?php

include '../db.php';

$id = $_POST['id'];
$match_a = $_POST['match_a'];
$match_b = $_POST['match_b'];



mysqli_query($con,"DELETE FROM matching WHERE id = '$id'");

mysqli_query($con,"UPDATE entry SET status = 'PENDING', fight_no = null WHERE id = '$match_a'");
mysqli_query($con,"UPDATE entry SET status = 'PENDING', fight_no = null WHERE id = '$match_b'");


?>