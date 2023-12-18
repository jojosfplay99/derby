<?php

include '../db.php';

$regno_a = $_POST['regno_a'];
$regno_b = $_POST['regno_b'];

$query = mysqli_query($con,"SELECT * FROM entry WHERE id = '$regno_a'");
while($row = mysqli_fetch_array($query)){
	$match_a = $row['bet'];
}

$query2 = mysqli_query($con,"SELECT * FROM entry WHERE id = '$regno_b'");
while($row = mysqli_fetch_array($query2)){
	$match_b = $row['bet'];
}

$array = array("match_a" => $match_a, "match_b" => $match_b);

echo json_encode($array);

?>