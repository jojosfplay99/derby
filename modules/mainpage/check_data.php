<?php

include 'db.php';

$id = $_POST['cookie_id'];

$query = mysqli_query($con,"SELECT * FROM user WHERE id = '$id'");
while($row = mysqli_fetch_array($query)){
	$array = array(
		"designation" => $row['designation']		
	);
}

echo json_encode($array);

?>