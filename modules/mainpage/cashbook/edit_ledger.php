<?php

include '../db.php';

$edit_id = $_POST['edit_id'];
$edit_payee = $_POST['edit_payee'];
$edit_credit_transaction = $_POST['edit_credit_transaction'];
$edit_credit_amount = $_POST['edit_credit_amount'];
$edit_debit_transaction = $_POST['edit_debit_transaction'];
$edit_debit_amount = $_POST['edit_debit_amount'];
$edit_remarks = $_POST['edit_remarks'];
$edit_date_created = $_POST['edit_date_created'];

mysqli_query($con,"UPDATE ledger SET payee = '$edit_payee',credit_transaction = '$edit_credit_transaction',credit_amount = '$edit_credit_amount', debit_transaction = '$edit_debit_transaction', debit_amount = '$edit_debit_amount', remarks = '$edit_remarks',date_created = '$edit_date_created' WHERE id = '$edit_id'");

?>