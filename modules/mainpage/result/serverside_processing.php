<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'matching';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(

    array('db' => 'id', 'dt' =>0),
    array('db' => 'match_a', 'dt' =>1),
    array('db' => 'regno_a', 'dt' =>2),
    array('db' => 'farmname_a', 'dt' =>3),
    array('db' => 'ownername_a', 'dt' =>4),
    array('db' => 'weight_a', 'dt' =>5),
    array('db' => 'total_bet_a', 'dt' =>6),

    array('db' => 'match_b', 'dt' =>7),
    array('db' => 'regno_b', 'dt' =>8),
    array('db' => 'farmname_b', 'dt' =>9),
    array('db' => 'ownername_b', 'dt' =>10),
    array('db' => 'weight_b', 'dt' =>11),
    array('db' => 'total_bet_b', 'dt' =>12),

    array('db' => 'fight_no', 'dt' =>13),
    array('db' => 'schedule_code', 'dt' =>14),
    array('db' => 'schedule_fight', 'dt' =>15),
    array('db' => 'winner', 'dt' =>16),
    array('db' => 'winner_id', 'dt' =>17),
    array('db' => 'total_bet_a', 'dt' =>18),
    array('db' => 'total_bet_b', 'dt' =>19),
    array('db' => 'pareha', 'dt' =>20),
    array('db' => 'deperensya', 'dt' =>21),
    array('db' => 'masyada', 'dt' =>22),
);
 
//include '../server_db.php';
require( '../server_db.php' );
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );

$date_today = date('Y-m-d');

//$query = "date_schedule > '$date_today' OR date_schedule = '$date_today'";


echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);