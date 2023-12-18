<?php

include '../db.php';

$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM propertydb_pending WHERE id = '$id'");
while($row = mysqli_fetch_array($query)){
	$array = array(
		"tdno" => $row['tdno'],
		"pin" => $row['pin'],
		"arp" => $row['arp'],
		"ownername" => $row['ownername'],
		"owneraddress" => $row['address'],
		"ownertin" => $row['ownertin'],
		"ownertel" => $row['ownertel'],
		"admin" => $row['admin'],
		"adminaddress" => $row['adminaddress'],
		"admintin" => $row['admintin'],
		"admintel" => $row['admintel'],
		"propertylocation" => $row['propertylocation'],
		"oct" => $row['oct'],
		"surveyno" => $row['surveyno'],
		"cct" => $row['cct'],
		"lotno" => $row['lotno'],
		"dated" => $row['dated'],
		"blkno" => $row['blkno'],
		"north" => $row['north'],
		"south" => $row['south'],
		"east" => $row['east'],
		"west" => $row['west'],
		"propertykind" => $row['propertykind'],
		"storey" => $row['storey'],
		"description" => $row['description'],
		"taxable" => $row['taxable'],
		"exempt" => $row['exempt'],
		"effectivity" => $row['effectivity'],
		"dateapproved" => $row['dateapproved'],
		"exempt" => $row['exempt'],
		"prevowner" => $row['prevowner'],
		"prevtd" => $row['prevtd'],
		"prevassval" => $row['prevassval'],
		"memoranda" => $row['memoranda'],

		);
}

echo json_encode($array);

?>