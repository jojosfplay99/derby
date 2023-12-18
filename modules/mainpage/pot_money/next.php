<?php

include '../db.php';

$clerkid = $_POST['clerkid'];

$user = mysqli_query($con,"SELECT * FROM user WHERE id = '$clerkid'");
while($row = mysqli_fetch_array($user)){
	$designation_id = $row['designation'];
}

echo $designation_id."<br>";

$query = mysqli_query($con,"SELECT * FROM que_assessor WHERE designation_id = '$designation_id' AND status = 'SERVING' || status = 'PRIORITY'");
$count = mysqli_num_rows($query);
if($count > 0){
	mysqli_query($con,"DELETE FROM que_assessor WHERE designation_id = '$designation_id'");
}

$query2 = mysqli_query($con,"SELECT * FROM que_assessor WHERE status = 'WAITING' ORDER BY que_number ASC LIMIT 1");
while($row2 = mysqli_fetch_array($query2)){
	$next_que = $row2['id'];
}

mysqli_query($con,"UPDATE que_assessor SET designation_id = '$designation_id', status = 'SERVING' WHERE id = '$next_que'");

?>