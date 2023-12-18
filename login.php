<?php

include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($con,"SELECT * FROM user WHERE user = '$username' AND password = '$password'");
$count = mysqli_num_rows($query);

if($count > 0 ){
	while($row = mysqli_fetch_array($query)){
		$array = array("code" => "1", "designation" => $row['designation'], "id" => $row['id'] );
	}
}
else{
		$array = array("code" => "0", "designation" => "none", "id" => "0");
}


echo json_encode($array);

?>