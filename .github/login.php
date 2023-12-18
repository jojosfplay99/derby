<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($con,"SELECT * FROM user WHERE user LIKE '$username' AND password = '$password'");
$count = mysqli_num_rows($query);
if($count == 0){
    $id = 0;
    $designation = 0;
    $status = 0;
}else{
    while($row = mysqli_fetch_array($query)){
        $id = $row['id'];
        $designation = $row['designation'];
        $status = $row['status'];
    }
}

if($designation == '6' || $designation == '7' || $designation == '8'){
    $heading = "assessor";
}else if($designation == '3' || $designation == '4' || $designation == '5'){
    $heading = "treasurer";
}else if($designation == '2'){
    $heading = "head_assessor";
}else if($designation == '1'){
    $heading = "head_treasurer";
}
else{
    $heading = "OTHER";
}



$data = array("count"=>$count,"clerkid"=>$id,"designation"=>$designation,"heading"=>$heading ,"status"=>$status);

echo json_encode($data);


?>