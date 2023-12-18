<?php

include '../db.php';

$id = $_POST['id'];
$stagcock_no = $_POST['stagcock_no'];
$wingband = $_POST['wingband'];
$legband = $_POST['legband'];
$weight = $_POST['weight'];
$bet = $_POST['bet'];

$bet = str_replace(",", "", $bet);

mysqli_query($con,"UPDATE entry SET stagcock = '$stagcock_no',wingband = '$wingband',legband = '$legband',weight = '$weight',bet = '$bet' WHERE id = '$id'");

?>