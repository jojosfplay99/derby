<?php

include '../db.php';

$id = $_POST['id'];

mysqli_query($con,"DELETE FROM additional_bet WHERE id = '$id'");


?>