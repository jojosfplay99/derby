<?php

include '../db.php';

$query = mysqli_query($con,"SELECT DISTINCT regno_a FROM matching ORDER BY regno_a ASC");
$count = mysqli_num_rows($query);
while($row = mysqli_fetch_array($query)){
    $array[] = $row['regno_a'];       
}

$query = mysqli_query($con,"SELECT * FROM matching ORDER BY regno_a ASC");
$count = mysqli_num_rows($query);
while($row = mysqli_fetch_array($query)){
    $array[] = $row['regno_a'];       
}

foreach($array as $value){
    echo $value."-";   
}




//echo json_encode($array);

/*
for($i = 0; $i < $count2; $i++){
    $value[] = array($i);
}







$query2 = mysqli_query($con,"SELECT DISTINCT regno_a FROM matching ORDER BY regno_a ASC");
$count2 = mysqli_num_rows($query2);
while($row2 = mysqli_fetch_array($query2)){
    $regno_a2 = $row2['regno_a'];

    $query3 = mysqli_query($con,"SELECT * FROM matching WHERE regno_a = '$regno_a2'");
    $count3 = mysqli_num_rows($query3);
    while($row3 = mysqli_fetch_array($query3)){
        echo $row3['id']."<br>";        
    }

}






for($i = 0; $i < $count; $i++){
    echo $id[$i]."=>".$i."<br>";
}

mysqli_query($con,"UPDATE matching SET fight_no = ''")

*/

?>