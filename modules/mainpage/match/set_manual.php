<?php

include '../db.php';

$id = $_POST['id'];
$fight_no = $_POST['fight_no'];
$match_a = $_POST['match_a'];
$match_b = $_POST['match_b'];

mysqli_query($con,"UPDATE matching SET fight_no = '$fight_no' WHERE id = '$id'");
mysqli_query($con,"UPDATE entry SET fight_no = '$fight_no' WHERE id = '$match_a'");
mysqli_query($con,"UPDATE entry SET fight_no = '$fight_no' WHERE id = '$match_b'");

?>