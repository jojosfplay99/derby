<?php

include '../db.php';

date_default_timezone_set('Asia/Manila');
$date_created = date('Y-m-d');
$generated = date('Ymdhis')."".rand(1,99);


$data1 = $_POST['data1'];
$match_type = $_POST['match_type'];
$match_id = $_POST['match_id'];
$additional_bet = $_POST['additional_bet'];
$additional_bet= str_replace(",", "", $additional_bet);

if($data1 == ''){
    mysqli_query($con,"INSERT INTO additional_bet(match_id,transnum,bet,match_type,date_created) VALUES('$match_id','$generated','$additional_bet','$match_type','$date_created')");    
}
else{
    mysqli_query($con,"INSERT INTO additional_bet(match_id,transnum,bet,match_type,date_created) VALUES('$match_id','$data1','$additional_bet','$match_type','$date_created')");
}



?>