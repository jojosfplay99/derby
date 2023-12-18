<?php
include '../db.php';

	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from schedule order by id limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from schedule where title like '%".$search."%' OR date_schedule like '%".$search."%'  limit 30");
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
		$dated = date_format(date_create($row['date_schedule']),'m/d/Y');
	    $data[] = array("id"=>$row['id'], "text"=>$row['promoter']." (".$dated.")" , "promoter"=>$row['promoter'] ,"schedule_date"=>$row['date_schedule'] , "schedule_code"=>$row['schedule_code']);
	}


echo json_encode($data);
?>
