<?php

include '../db.php';

$id = $_POST['id'];
$clerkid = $_POST['user'];

$query = mysqli_query($con,"SELECT * FROM user WHERE id = '$clerkid'");
while($row = mysqli_fetch_array($query)){
	$designation = $row['designation'];
}



$query = mysqli_query($con,"SELECT * FROM que_assessor WHERE designation_id = '$designation' AND status = 'SERVING' || status = 'PRIORITY'");
$count = mysqli_num_rows($query);
if($count > 0){
	mysqli_query($con,"DELETE FROM que_assessor WHERE designation_id = '$designation'");
}


mysqli_query($con,"UPDATE que_assessor SET status = 'PRIORITY', designation_id = '$designation' WHERE id = '$id'");


?>