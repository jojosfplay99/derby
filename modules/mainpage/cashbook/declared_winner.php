<?php

include '../db.php';

$id = $_POST['id'];
$winner = $_POST['winner'];
$winner_farmname = $_POST['winner_farmname'];
$winner_ownername = $_POST['winner_ownername'];
$winner_id = $_POST['winner_id'];

echo $winner;

if($winner == 'MATCH A'){
    $query = mysqli_query($con,"UPDATE matching SET winner = '$winner_ownername', winner_id = '$winner_id', winner_farmname = '$winner_farmname', status1 = '1', status2 = '0' WHERE id = '$id'");
}

else if($winner == 'MATCH B'){
    $query = mysqli_query($con,"UPDATE matching SET winner = '$winner_ownername', winner_id = '$winner_id', winner_farmname = '$winner_farmname', status1 = '0', status2 = '1' WHERE id = '$id'");
}

else if($winner == 'DRAW'){
    $query = mysqli_query($con,"UPDATE matching SET winner = '$winner_ownername', winner_id = '$winner_id', winner_farmname = '$winner_farmname', status1 = '0.5', status2 = '0.5' WHERE id = '$id'");
}

else if($winner == 'NF'){
    $query = mysqli_query($con,"UPDATE matching SET winner = '$winner_ownername', winner_id = '$winner_id', winner_farmname = '$winner_farmname', status1 = null, status2 = null WHERE id = '$id'");
}



?>