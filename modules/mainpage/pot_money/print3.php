<?php

include '../db.php';

$search = $_GET['search'];

$query = mysqli_query($con,"SELECT * FROM pot_money WHERE schedule_code = '$search'");
while($row = mysqli_fetch_array($query)){
    
$farm_id = $row['farm_id'];
$farmname = $row['farmname'];
$ownername = $row['ownername'];
$pot_money = $row['pot_money'];
$payor = $row['payor'];
$date_created = date_create($row['date_created']);
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
            font-size: 40px;
        }
        #data{
            font-family:'Times New Roman', Times, serif;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="d-flex flex-column text-center mb-5" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
            <div><h2>ENTRANCE SUMMARY</h2></div>
            <div><h4><?php echo date_format($date_created,"F d, Y");?></h4></div>
        </div>    

        <div class="card">
        <div class="card-header">
            Summary
        </div>
        <div class="card-body">
            <table class="table table-bordered" style="width:100%;font-size:12px;font-weight:bolder">                   
                <tr>
                    <th width="10%">FARM ID</th>
                    <th>FARM NAME</th>                            
                    <th>OWNER NAME</th>     
                    <th>POT MONEY</th>                                                   
                    <th>PAYOR</th>                                                    
                </tr>
                <?php                             
                    $pot_money2 = 0;       
                    $query2 = mysqli_query($con,"SELECT * FROM pot_money WHERE schedule_code = '$search'");
                    while($row2 = mysqli_fetch_array($query2)){                                
                        $farm_id = $row2['farm_id'];
                        $farmname = $row2['farmname'];
                        $ownername = $row2['ownername'];
                        $pot_money = $row2['pot_money'];
                        $pot_money2 += $pot_money;
                        $payor = $row2['payor'];                                                                                 
                        echo "<tr>";
                        echo "<td>".$farm_id."</td>";                
                        echo "<td>".$farmname."</td>";                
                        echo "<td>".$ownername."</td>";                
                        echo "<td>₱ ".number_format($pot_money, 2, '.', ',')."</td>";                
                        echo "<td>".$payor."</td>";                
                        echo "</tr>";
                    }                                                               
                ?>  
                <tfoot>
                    <tr>
                        <td colspan="3">TOTAL</td>
                        <td>₱ <?php echo number_format($pot_money2, 2, '.', ',');?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">FOR PROMOTER/ORGANIZATION (10%)</td>
                        <td>₱
                            <?php 
                                $pot_money3 = $pot_money2 * .10;
                                echo number_format($pot_money3, 2, '.', ',');
                            ?>
                        </td>
                        <td></td>
                    </tr>
                    
                </tfoot>                  
            </table>        
        </div>
        </div>

        
                                                        
    </div>
    
    
</body>
</html>

