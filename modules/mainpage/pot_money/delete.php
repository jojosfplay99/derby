<?php

include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM pot_money WHERE id = '$id'");


?>