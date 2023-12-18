<?php

$id = $_POST['id'];

include '../db.php';

mysqli_query($con,"DELETE FROM registration WHERE id = '$id'");

?>