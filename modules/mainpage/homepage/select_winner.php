<?php

include '../db.php';

$id = $_POST['id'];
$dated = $_POST['dated'];

$query = mysqli_query($con,"SELECT * FROM winners WHERE draw_date = '$dated'");
$count = mysqli_num_rows($query);
if($count == '0'){
    mysqli_query($con,"INSERT INTO winners(draw_date,draw) VALUES('$dated','1')");
    mysqli_query($con,"UPDATE entrance SET raffle_status='WINNER 1' WHERE id='$id'");
}
else{
    
    $query2 = mysqli_query($con,"SELECT * FROM winners WHERE draw_date = '$dated'");
    while($row2 = mysqli_fetch_array($query2)){
        $draw = $row2['draw'];
    }
        $next_draw = $draw + 1;
        mysqli_query($con,"UPDATE winners SET draw = $next_draw WHERE draw_date='$dated'");
        mysqli_query($con,"UPDATE entrance SET raffle_status='WINNER $next_draw' WHERE id='$id'");
        
    
}



?>