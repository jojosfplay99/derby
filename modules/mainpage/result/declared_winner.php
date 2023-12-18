<?php

include '../db.php';

$id = $_POST['id'];
$winner = $_POST['winner'];
$winner_name = $_POST['winner_name'];
$winner_id = $_POST['winner_id'];


if($winner == 'MATCH A'){
    mysqli_query($con,"UPDATE matching SET winner = '$winner_name', winner_id = '$winner_id' WHERE id = '$id'");
    $query = mysqli_query($con,"SELECT * FROM matching WHERE id = '$id'");
    while($row = mysqli_fetch_array($query)){
        $match_result1 = $row['match_a'];
        $match_result2 = $row['match_b'];
        mysqli_query($con,"UPDATE entry SET SCORE = '1' WHERE id = '$match_result1'");
        mysqli_query($con,"UPDATE entry SET SCORE = '0' WHERE id = '$match_result2'");        
    }
}

else if($winner == 'MATCH B'){
    mysqli_query($con,"UPDATE matching SET winner = '$winner_name', winner_id = '$winner_id' WHERE id = '$id'");
    $query = mysqli_query($con,"SELECT * FROM matching WHERE id = '$id'");
    while($row = mysqli_fetch_array($query)){
        $match_result1 = $row['match_a'];
        $match_result2 = $row['match_b'];
        mysqli_query($con,"UPDATE entry SET SCORE = '0' WHERE id = '$match_result1'");
        mysqli_query($con,"UPDATE entry SET SCORE = '1' WHERE id = '$match_result2'");        
    }
}

else if($winner == 'DRAW'){
    $winner_array = explode(",",$winner_id);
    $count = count($winner_array);    
    mysqli_query($con,"UPDATE matching SET winner = 'DRAW', winner_id = '$winner_id' WHERE id = '$id'");

    for($i = 0; $i < $count; $i++){
        $query = mysqli_query($con,"SELECT * FROM matching WHERE id = '$winner_array[$i]'");
        while($row = mysqli_fetch_array($query)){
            $match_result1 = $row['match_a'];
            $match_result2 = $row['match_b'];
            mysqli_query($con,"UPDATE entry SET SCORE = '.5' WHERE id = '$match_result1'");
            mysqli_query($con,"UPDATE entry SET SCORE = '.5' WHERE id = '$match_result2'");        
        }
    }
    
}

else if($winner == 'NF'){
    mysqli_query($con,"UPDATE matching SET winner = 'NO FIGHT', winner_id = 'NO FIGHT' WHERE id = '$id'");
    $winner_array = explode(",",$winner_id);
    $count = count($winner_array);    
    for($i = 0; $i < $count; $i++){
        $query = mysqli_query($con,"SELECT * FROM matching WHERE id = '$winner_array[$i]'");
        while($row = mysqli_fetch_array($query)){
            $match_result1 = $row['match_a'];
            $match_result2 = $row['match_b'];
            mysqli_query($con,"UPDATE entry SET SCORE = '0' WHERE id = '$match_result1'");
            mysqli_query($con,"UPDATE entry SET SCORE = '0' WHERE id = '$match_result2'");        
        }
    }
}



?>