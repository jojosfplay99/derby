<?php

include '../db.php';


$dated = $_POST['date'];


$query = mysqli_query($con,"SELECT * FROM entrance WHERE date_created ='$dated' AND raffle_status IS NULL");
while($row = mysqli_fetch_array($query)){
    $array[] = $row['id'];
}

echo json_encode($array);

?>