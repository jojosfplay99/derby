<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from registration order by id limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from registration where farm_name like '%".$search."%' OR ownername like '%".$search."%' limit 30");
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
	    $data[] = array("id"=>$row['id'], "text"=>$row['farm_name']." / ".$row['ownername'] ,  "farm_name"=>$row['farm_name']  , "ownername"=>$row['ownername']);        
	}


echo json_encode($data);
?>


