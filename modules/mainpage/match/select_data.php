<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from entry GROUP BY regno limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from entry where farm_name like '%".$search."%' OR ownername like '%".$search."%' limit 30 ");
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
	    $data[] = array("id"=>$row['id'], "text"=>$row['farm_name'] , "ownername"=>$row['ownername'], "regno"=>$row['regno'] , "schedule_code"=>$row['schedule_code']);
	}


echo json_encode($data);
?>
