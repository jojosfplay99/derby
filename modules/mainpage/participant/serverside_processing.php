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
$table = 'entry';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'farm_name', 'dt' => 1 ),
    array( 'db' => 'ownername', 'dt' => 2 ),
    array( 'db' => 'regno', 'dt' => 3),
    //array( 'db' => 'schedule_fight', 'dt' => 4),
    array(
        'db'        => 'schedule_fight',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return date( 'm/d/Y', strtotime($d));
        }
    ),
    array( 'db' => 'schedule_code', 'dt' => 5),
    array( 'db' => 'stagcock', 'dt' => 6),
    array( 'db' => 'wingband', 'dt' => 7),
    array( 'db' => 'legband', 'dt' => 8),
    array( 'db' => 'weight', 'dt' => 9),
    array( 'db' => 'bet', 'dt' => 10),

    
);
 
//include '../server_db.php';
require( '../server_db.php' );
require( '../db.php' );
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
