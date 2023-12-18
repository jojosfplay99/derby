<?php

include '../db.php';

$id = $_POST['matching_id'];
$listGroupRadios = $_POST['listGroupRadios'];


if($listGroupRadios == 'MATCH_A'){    
    $query = mysqli_query($con,"SELECT * FROM matching WHERE id = '$id'");
    while($row = mysqli_fetch_array($query)){
        $match_result1 = $row['match_a'];
        $match_result2 = $row['match_b'];            
        mysqli_query($con,"UPDATE entry SET SCORE = '1' WHERE id = '$match_result1'");
        mysqli_query($con,"UPDATE entry SET SCORE = '0' WHERE id = '$match_result2'");        
        $query2 = mysqli_query($con,"SELECT * FROM entry WHERE id = '$match_result1'");
        while($row2 = mysqli_fetch_array($query2)){
            $farm_name = $row2['farm_name'];
        }
    } 
    mysqli_query($con,"UPDATE matching SET winner = '$farm_name', winner_id = '$match_result1' WHERE id = '$id'");        
}
else if($listGroupRadios == 'MATCH_B'){
    $query = mysqli_query($con,"SELECT * FROM matching WHERE id = '$id'");
    while($row = mysqli_fetch_array($query)){
        $match_result1 = $row['match_a'];
        $match_result2 = $row['match_b'];
        mysqli_query($con,"UPDATE entry SET SCORE = '0' WHERE id = '$match_result1'");
        mysqli_query($con,"UPDATE entry SET SCORE = '1' WHERE id = '$match_result2'");        
        $query2 = mysqli_query($con,"SELECT * FROM entry WHERE id = '$match_result2'");
        while($row2 = mysqli_fetch_array($query2)){
            $farm_name = $row2['farm_name'];
        }
    }
    mysqli_query($con,"UPDATE matching SET winner = '$farm_name', winner_id = '$match_result2' WHERE id = '$id'");        
}
else if($listGroupRadios == 'DRAW'){
    $query = mysqli_query($con,"SELECT * FROM matching WHERE id = '$id'");
    while($row = mysqli_fetch_array($query)){
        $match_result1 = $row['match_a'];
        $match_result2 = $row['match_b'];
        mysqli_query($con,"UPDATE entry SET SCORE = '.5' WHERE id = '$match_result1'");
        mysqli_query($con,"UPDATE entry SET SCORE = '.5' WHERE id = '$match_result2'");        
    }
    mysqli_query($con,"UPDATE matching SET winner = 'DRAW', winner_id = '$match_result1,$match_result2' WHERE id = '$id'");        
}
else if($listGroupRadios == 'NO_FIGHT'){
    $query = mysqli_query($con,"SELECT * FROM matching WHERE id = '$id'");
    while($row = mysqli_fetch_array($query)){
        $match_result1 = $row['match_a'];
        $match_result2 = $row['match_b'];
        mysqli_query($con,"UPDATE entry SET SCORE = '0' WHERE id = '$match_result1'");
        mysqli_query($con,"UPDATE entry SET SCORE = '0' WHERE id = '$match_result2'");        
    }
    mysqli_query($con,"UPDATE matching SET winner = 'NO FIGHT', winner_id = 'NO FIGHT' WHERE id = '$id'");        
}


?>