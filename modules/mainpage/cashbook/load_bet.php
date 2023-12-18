<?php
include '../db.php';

$id = $_POST['id'];

$date_created = date("Y-m-d");
$transnum = date("Ymdhis")."".rand(1,99);

$query = mysqli_query($con,"SELECT * FROM matching WHERE id = '$id'");
while($row = mysqli_fetch_array($query)){
    $match_id_a = $row['match_a'];
    $regno_a = $row['regno_a'];
    $farmname_a = $row['farmname_a'];
    $ownername_a = $row['ownername_a'];
    $weight_a = $row['weight_a'];
    $bet_a = $row['bet_a'];
    $match_id_b = $row['match_b'];
    $regno_b = $row['regno_b'];
    $farmname_b = $row['farmname_b'];
    $ownername_b = $row['ownername_b'];
    $weight_b = $row['weight_b'];
    $bet_b = $row['bet_b'];
    $fight_no = $row['fight_no'];
    $schedule_code = $row['schedule_code'];
    $schedule_fight = $row['schedule_fight'];
    $winner = $row['winner'];
    $winner_id = $row['winner_id'];
    $winner_farmname = $row['winner_farmname'];
}

if($winner_id != null){
    $total_add_bet_a = 0;
    $total_add_bet_b = 0;

    

    $query2 = mysqli_query($con,"SELECT * FROM additional_bet WHERE match_id = '$id' AND match_type = 'match_a'");
    while($row2 = mysqli_fetch_array($query2)){
        $total_add_bet_a += $row2['bet'];
    }

    $total_bet_a = $total_add_bet_a + $bet_a;

    $query3 = mysqli_query($con,"SELECT * FROM additional_bet WHERE match_id = '$id' AND match_type = 'match_b'");
    while($row3 = mysqli_fetch_array($query3)){
        $total_add_bet_b += $row3['bet'];
    }

    $total_bet_b = $total_add_bet_b + $bet_b;
    
    echo $total_bet_b;

    if($winner_id == $match_id_a){
        if($total_bet_a > $total_bet_b){
            $pareha = $total_bet_b;
            $deperensya = $total_bet_a - $total_bet_b;
            $ariba = $pareha * .10;
            $monton = 0;
            echo "WINNER A INILOG: ".$total_add_bet_a." | ".$monton ." | ".$pareha ." | ".$deperensya;
            mysqli_query($con,"INSERT INTO bet_slip(matching_id,match_id,farmname,ownername,bet_owner,bet_additional,total_bet,pareha,deperensya,ariba,monton,status,fight_code,fight_no,transnum,date_created,match_type) VALUES('$id','$match_id_a','$farmname_a','$ownername_a','$bet_a','$total_add_bet_a','$total_bet_a','$pareha','$deperensya','$ariba','$monton','INILOG','$schedule_code','$fight_no','$transnum','$date_created','match_a')");
        }
        else if($total_bet_a < $total_bet_b){
            $deperensya = $total_bet_b - $total_bet_a;
            $pareha = $total_bet_a;
            $ariba = $bet_a * .10;
            $monton = $total_add_bet_a * .10;
            mysqli_query($con,"INSERT INTO bet_slip(matching_id,match_id,farmname,ownername,bet_owner,bet_additional,total_bet,pareha,deperensya,ariba,monton,status,fight_code,fight_no,transnum,date_created,match_type) VALUES('$id','$match_id_a','$farmname_a','$ownername_a','$bet_a','$total_add_bet_a','$total_bet_a','$pareha','$deperensya','$ariba','$monton','BIYA','$schedule_code','$fight_no','$transnum','$date_created','match_a')");
            echo "WINNER A INILOG: ".$total_add_bet_a." | ".$monton ." | ".$pareha ." | ".$deperensya;
        }   
        echo "HERE!";
    }
    else{        
        if($total_bet_a < $total_bet_b){
            $deperensya = $total_bet_b - $total_bet_a;
            $pareha = $total_bet_a;
            $ariba = $pareha * .10;
            $monton = 0;
            echo "WINNER A INILOG: ".$total_add_bet_a." | ".$monton ." | ".$pareha ." | ".$deperensya;
            mysqli_query($con,"INSERT INTO bet_slip(matching_id,match_id,farmname,ownername,bet_owner,bet_additional,total_bet,pareha,deperensya,ariba,monton,status,fight_code,fight_no,transnum,date_created,match_type) VALUES('$id','$match_id_b','$farmname_b','$ownername_b','$bet_b','$total_add_bet_b','$total_bet_b','$pareha','$deperensya','$ariba','$monton','INILOG','$schedule_code','$fight_no','$transnum','$date_created','match_b')");
        }
        else{
            $deperensya = $total_bet_a - $total_bet_b;            
            $pareha = $total_bet_b;
            $ariba = $bet_b * .10;
            $monton = $total_add_bet_b * .10;
            echo "WINNER A INILOG: ".$total_add_bet_a." | ".$monton ." | ".$pareha ." | ".$deperensya;
            mysqli_query($con,"INSERT INTO bet_slip(matching_id,match_id,farmname,ownername,bet_owner,bet_additional,total_bet,pareha,deperensya,ariba,monton,status,fight_code,fight_no,transnum,date_created,match_type) VALUES('$id','$match_id_b','$farmname_b','$ownername_b','$bet_b','$total_add_bet_b','$total_bet_b','$pareha','$deperensya','$ariba','$monton','BIYA','$schedule_code','$fight_no','$transnum','$date_created','match_b')");
        } 
        echo "HERE2!";
        
    }

}










?>