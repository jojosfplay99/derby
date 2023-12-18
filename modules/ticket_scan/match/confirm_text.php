<?php

include '../db.php';



$dated = date('Y-m-d');

$entrance_num = $_POST['decoded'];

$query = mysqli_query($con,"SELECT * FROM entrance WHERE date_created = '$dated' and entrance_num = '$entrance_num'");
$count = mysqli_num_rows($query);
if($count == 1){
    mysqli_query($con,"UPDATE entrance SET limit_entrance = '1' WHERE date_created = '$dated' and entrance_num = '$entrance_num'");
    while($row = mysqli_fetch_array($query)){
        $limit_entrance = $row['limit_entrance'];        
    }

    if($limit_entrance == null){
        $limit = 0;
    }
    else{
        $limit = $limit_entrance;
    }
}
else{
    $count = 0;
    $limit = null;
}

$array = array("count"=>$count, "limit"=>$limit);

echo json_encode($array)

?>