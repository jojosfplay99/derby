<?php

include '../db.php';

$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM matching WHERE id = '$id'");
while($row = mysqli_fetch_array($query)){
    $owner_a = $row['bet_a'];
    $owner_b = $row['bet_b'];
}

$query2 = mysqli_query($con,"SELECT SUM(bet) as add_bet_a FROM additional_bet WHERE match_id = '$id' AND match_type = 'match_a'");
while($row2 = mysqli_fetch_array($query2)){
    $add_bet_a = $row2['add_bet_a'];
}

$query3 = mysqli_query($con,"SELECT  SUM(bet) as add_bet_b  FROM additional_bet WHERE match_id = '$id' AND match_type = 'match_b'");
while($row3 = mysqli_fetch_array($query3)){
    $add_bet_b = $row3['add_bet_b'];
}

$total_a = $owner_a + $add_bet_a;
$total_b = $owner_b + $add_bet_b;

$array = array(
    'total_a' => $total_a,
    'total_b' => $total_b,
);

echo json_encode($array);
?>