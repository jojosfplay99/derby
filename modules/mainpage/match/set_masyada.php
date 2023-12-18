<?php

include '../db.php';

$set_matching_id_data = $_POST['set_matching_id_data'];
$set_pareha_data = $_POST['set_pareha_data'];
$set_deperensya_data = $_POST['set_deperensya_data'];
$set_masyada_data = $_POST['set_masyada_data'];
$set_total_bet_a = $_POST['set_total_bet_a'];
$set_total_bet_b = $_POST['set_total_bet_b'];


mysqli_query($con,"UPDATE matching SET total_bet_a = '$set_total_bet_a', total_bet_b = '$set_total_bet_b', pareha = '$set_pareha_data', deperensya = '$set_deperensya_data', masyada = '$set_masyada_data' WHERE id = '$set_matching_id_data'");

?>