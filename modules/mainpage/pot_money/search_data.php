<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from schedule order by id limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from schedule where title like '%".$search."%' limit 30");
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
	    $data[] = array("id"=>$row['schedule_code'], "text"=>$row['title'] , "schedule_code"=>$row['schedule_code']);
	}


echo json_encode($data);
?>
