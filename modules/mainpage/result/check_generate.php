<?php

include '../db.php';

$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM bet_slip WHERE matching_id = '$id'");
echo mysqli_num_rows(($query));

?>