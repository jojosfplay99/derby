<?php
include '../db.php';

$id = $_POST['edit_matching_id'];
$bet_owner_a = $_POST['bet_owner_a'];
$bet_owner_b = $_POST['bet_owner_b'];

mysqli_query($con,"UPDATE matching SET bet_a = '$bet_owner_a', bet_b = '$bet_owner_b' WHERE id = '$id'");


?>