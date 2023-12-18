<?php

include '../db.php';

$search2 = $_POST['search2'];
$search3 = $_POST['search3'];
$entry_id1 = $_POST['entry_id1'];
$schedule_code = $_POST['schedule_code'];
$farm_name = $_POST['farm_name'];
$ownername1 = $_POST['ownername1'];
$date_today = $_POST['date_today'];
$payor = $_POST['payor'];
$pot_money = str_replace(',', '',$_POST['pot_money']);

date_default_timezone_set('Asia/Manila');
$dated = date('Y-m-d');


mysqli_query($con,"INSERT INTO pot_money(schedule_code,farm_id,farmname,ownername,pot_money,payor,date_created)VALUES('$schedule_code','$entry_id1','$farm_name','$ownername1','$pot_money','$payor','$date_today')");

?>