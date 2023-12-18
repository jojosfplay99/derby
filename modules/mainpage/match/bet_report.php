<?php

include '../db.php';

$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM additional_bet WHERE match_id = '$id'");
while ($row = mysqli_fetch_array($query)){
    $array[] = array("id"=>$row['id'], "match_id"=>$row['match_id'], "transnum"=>$row['transnum'], "bet"=>$row['bet'], "match_type"=>$row['match_type'], "date_created"=>$row['date_created']);
}

echo json_encode($array);

?>