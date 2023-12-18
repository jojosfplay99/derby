<?php

include '../db.php';

$match_a = $_POST['match_a'];
$farmname_a = $_POST['farmname_a'];
$ownername_a = $_POST['ownername_a'];
$regno_a = $_POST['regno_a'];
$weight_a = $_POST['weight_a'];
$fightschedule_a = $_POST['fightschedule_a'];
$fightcode_a = $_POST['fightcode_a'];
$bet_a = $_POST['bet_a'];
$bet_a = str_replace(",", "", $bet_a);

$match_b = $_POST['match_b'];
$farmname_b = $_POST['farmname_b'];
$ownername_b = $_POST['ownername_b'];
$fightschedule_b = $_POST['fightschedule_b'];
$fightcode_b = $_POST['fightcode_b'];
$regno_b = $_POST['regno_b'];
$weight_b = $_POST['weight_b'];
$bet_b = $_POST['bet_b'];
$bet_b = str_replace(",", "", $bet_b);

$query = mysqli_query($con,"SELECT * FROM entry WHERE schedule_code = '$fightschedule_a' GROUP BY regno");
$total_participants = mysqli_num_rows($query);

mysqli_query($con,"INSERT INTO matching(match_a,regno_a,farmname_a,ownername_a,weight_a,bet_a,match_b,regno_b,farmname_b,ownername_b,weight_b,bet_b,fight_no,schedule_code,schedule_fight,winner,winner_id) VALUES('$match_a','$regno_a','$farmname_a','$ownername_a','$weight_a','$bet_a','$match_b','$regno_b','$farmname_b','$ownername_b','$weight_b','$bet_b',null,'$fightcode_a','$fightschedule_a',null,null)");


mysqli_query($con,"UPDATE entry SET status = 'MATCHED' WHERE id = '$match_a'");
mysqli_query($con,"UPDATE entry SET status = 'MATCHED' WHERE id = '$match_b'");

?>