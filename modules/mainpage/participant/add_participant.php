<?php

include '../db.php';

$search = $_POST['search'];
$farm_id = $_POST['farm_id'];
$farm_name = $_POST['farm_name'];
$ownername = $_POST['ownername'];
$regno = $_POST['regno'];
$search_schedule = $_POST['search_schedule'];
$schedule_date = $_POST['schedule_date'];
$schedule_code = $_POST['schedule_code'];
$stagcock_no = $_POST['stagcock_no'];
$wingband = $_POST['wingband'];
$legband = $_POST['legband'];
$weight = $_POST['weight'];
$bet = $_POST['bet'];


$bet = str_replace(",", "", $bet);

$query = mysqli_query($con,"SELECT * FROM participant where regno = '$regno' AND scheduled_fight = '$schedule_date' AND schedule_code = '$schedule_code'");
$count = mysqli_num_rows($query);
if($count == 0){
	echo $count;
	mysqli_query($con,"INSERT INTO participant(farm_name,ownername,regno,scheduled_fight,schedule_code) VALUES('$farm_name','$ownername','$regno','$schedule_date','$schedule_code')");
	mysqli_query($con,"INSERT INTO entry(farm_name,ownername,regno,schedule_fight,schedule_code,stagcock,wingband,legband,weight,bet,fight_no,status) VALUES('$farm_name','$ownername','$regno','$schedule_date','$schedule_code','$stagcock_no','$wingband','$legband','$weight','$bet',null,'PENDING')");
}
else{
	echo $count;
	mysqli_query($con,"INSERT INTO entry(farm_name,ownername,regno,schedule_fight,schedule_code,stagcock,wingband,legband,weight,bet,fight_no,status) VALUES('$farm_name','$ownername','$regno','$schedule_date','$schedule_code','$stagcock_no','$wingband','$legband','$weight','$bet',null,'PENDING')");
}

?>