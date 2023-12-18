<?php

include 'db.php';

$name = mysqli_escape_string($con,$_POST['name']);
$username = mysqli_escape_string($con,$_POST['username']);
$password = mysqli_escape_string($con,$_POST['password']);
$office = $_POST['office'];

$query = mysqli_query($con,"SELECT * FROM user WHERE user = '$username'");
$count = mysqli_num_rows($query);
if($count == 0){
	mysqli_query($con,"INSERT INTO user(name,user,password,designation,status) VALUES('$name','$username','$password','$office','ACTIVE') ");
}
else{
	echo "exist";
}


?>