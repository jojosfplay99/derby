<?php

include '../db.php';

$query = mysqli_query($con,"SELECT * FROM entrance");
while($row = mysqli_fetch_array($query)){
    $array[] = $row['entrance_num'];
}


echo json_encode($array);


?>