<?php
include 'db.php';


	if(!isset($_POST['searchTerm'])){
		$fetchData = mysqli_query($con,"select * from designation_table order by id limit 10");
	}else{
		$search = $_POST['searchTerm'];
		$fetchData = mysqli_query($con,"select * from designation_table where designation like '%".$search."%' limit 30");
	}
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
	    $data[] = array("id"=>$row['id'], "text"=>$row['designation']);
	}




echo json_encode($data);
?>
