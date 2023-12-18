<?php
include '../db.php';

$dated = $_POST['date'];

mysqli_query($con,"DELETE FROM winners WHERE draw_date = '$dated'");
mysqli_query($con,"UPDATE entrance SET raffle_status = null WHERE date_created = '$dated'");


?>