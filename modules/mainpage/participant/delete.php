<?php

$id = $_POST['id'];

include '../db.php';

$id = $_POST['id'];


mysqli_query($con,"DELETE FROM entry WHERE id = '$id'");

?>