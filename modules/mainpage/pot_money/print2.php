<?php

include '../db.php';

$id = $_GET['id'];

$query = mysqli_query($con,"SELECT * FROM pot_money WHERE id = '$id'");
while($row = mysqli_fetch_array($query)){
    
$schedule_code = $row['schedule_code'];
$farm_id = $row['farm_id'];
$farmname = $row['farmname'];
$ownername = $row['ownername'];
$pot_money = $row['pot_money'];
$formatter = new NumberFormatter('en_PH',  NumberFormatter::CURRENCY);
$pot_money = $formatter->formatCurrency($pot_money, 'PHP');
$payor = $row['payor'];
$date_created = $row['date_created'];

}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="../../../js/bootstrap.min.js"></script>
    <style>
        #header{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 20px;
        }
        #data{
            font-family:'Times New Roman', Times, serif;
            font-size: 18px;
        }
    </style>
</head>
<body>    
    <div class="container-fluid text-start"style="width:80%;font-size:13px;">
        <div class="card">            
            <div class="card-body">
                <h3 class="text-center" style="font-family: sans-serif;font-weight:bolder;">POT MONEY</h3>
                <hr>
                <div class="row mb-2">
                    <div class="col-8">
                        <div class="d-flex flex-row" style="font-family: serif;font-weight:bolder;">
                            <div class="mx-3">PAYOR: </div>
                            <div><?php echo $payor;?></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-row" style="font-family: serif;font-weight:bolder;">
                            <div class="mx-3">DATE: </div>
                            <div><?php echo $date_created;?></div>
                        </div>
                    </div>
                </div>    
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th style="width:80%;">ENTRY NAME</th>
                        <th style="width:20%;">POT MONEY</th>
                    </tr>
                    <tr>
                        <td><?php echo $farmname?></td>
                        <td><?php echo $pot_money?></td>
                    </tr>
                </table>                   
            </div>
        </div>   
</body>
</html>

