<?php

include '../db.php';

$payee = $_POST['payee'];
$credit_transaction = $_POST['credit_transaction'];
$credit_amount = $_POST['credit_amount'];
$debit_transaction = $_POST['debit_transaction'];
$debit_amount = $_POST['debit_amount'];
$remarks = $_POST['remarks'];
$date_created = $_POST['date_created'];

mysqli_query($con,"INSERT INTO ledger(payee,credit_transaction,credit_amount,debit_transaction,debit_amount,remarks,date_created) VALUES('$payee','$credit_transaction','$credit_amount','$debit_transaction','$debit_amount','$remarks','$date_created')")

?>