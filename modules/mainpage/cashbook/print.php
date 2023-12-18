<?php

include '../db.php';

$data1 = $_GET['data1'];


$query = mysqli_query($con,"SELECT * FROM bet_slip WHERE matching_id = '$data1'");
while($row = mysqli_fetch_array($query)){
    $farmname = $row['farmname'];
    $ownername = $row['ownername'];
    $bet_owner = $row['bet_owner'];
    $bet_additional = $row['bet_additional'];
    $total_bet = $row['total_bet'];
    $deperensya = $row['deperensya'];
    $pareha = $row['pareha'];
    $ariba = $row['ariba'];
    $monton = $row['monton'];
    $tax = 150;
    $status = $row['status'];
    $match_type = $row['match_type'];
}    
  
$total_deductions = $ariba + $monton + $tax;

$total_winnings = $pareha - $total_deductions;


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
        <?php
            if($status == 'INILOG'){             
                echo "#monton{display: none;}";                
            }
            else{
                echo "#status{color: red;}";                
            }
        ?>
        @media print {
            * {
                color: inherit !important;
                background: inherit !important;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center" id="header">WINNER SLIP</h2>
        <hr>             
        <div class="text-center status mb-5" id="status" style="font-size:40px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
            <?php
                if($status == 'INILOG'){
                    echo "<span class='badge bg-primary'>".$status."</span>";                        
                }
                else{
                    echo "<span class='badge bg-danger'>".$status."</span>";                
                }
            ?>            
        </div>   
        <table class="table table-responsive table-bordered">            
            <tr style="background-color:gray;color:white;">
                <td>OWNER'S BET</td>
                <td width="70%">₱ <?php echo number_format($bet_owner, 2, '.', ',')?></td>
            </tr>                    
        </table>                                         

        <table class="table table-responsive table-bordered">
            <?php
                $query2 = mysqli_query($con,"SELECT * FROM additional_bet WHERE match_id = '$data1' and match_type = '$match_type'");
                if(mysqli_num_rows($query2) == 0){
                    echo "<tr>";
                    echo "<td colspan='2' class='text-center'>----------- NO ADDITIONAL BET -----------</td>";
                    echo "</tr>";
                }
                else{
                    while($row2 = mysqli_fetch_array($query2)){
                        echo "<tr>";
                        echo "<td>".$row2['transnum']."</td>";
                        echo "<td>₱ ".number_format($row2['bet'], 2, '.', ',')."</td>";
                        echo "</tr>";
                     }
                }
                
            ?>
            <tr style="background-color:gray;color:white;">
                <td>TOTAL ADDITIONAL BET</td>
                <td width="70%"><?php echo "₱ ".number_format($bet_additional, 2, '.', ',')?></td>
            </tr>
        </table>

        <table class="table table-responsive table-bordered">
            <tr>
                <td width="30%">PAREHA</td>
                <td width="70%"><?php echo "₱ ".number_format($pareha, 2, '.', ',');?></td>
            </tr>
            <tr id="monton">
                <td width="30%">DEPERENSYA</td>
                <td width="70%"><?php echo "₱ ".number_format($monton, 2, '.', ',');?></td>
            </tr>            
        </table>

        <table class="table table-responsive table-bordered">
            <tr>
                <td width="30%">ARIBA</td>
                <td width="70%"><?php echo "₱ ".number_format($ariba, 2, '.', ',');?></td>
            </tr>
            <tr id="monton">
                <td width="30%">MONTON</td>
                <td width="70%"><?php echo "₱ ".number_format($monton, 2, '.', ',');?></td>
            </tr>
            <tr>
                <td width="30%">TAX</td>
                <td width="70%"><?php echo "₱ ".number_format($tax, 2, '.', ',');?></td>
            </tr>
            <tr style="background-color:gray;color:white;">
                <td width="30%">TOTAL DEDUCTIONS</td>
                <td width="70%"><?php echo "₱ ".number_format($total_deductions, 2, '.', ',');?></td>
            </tr>
            <tr style="background-color:#0275d8;color:white;">
                <td width="30%">TOTAL WINNINGS</td>
                <td width="70%"><?php echo "₱ ".number_format($total_winnings, 2, '.', ',');?></td>
            </tr>
        </table>
        <br><br><br>
        <div class="text-center" style="font-size:50px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;line-height:20px;"><?php echo $farmname?></div>   
        <div class="text-center" style="font-size:40px;font-family:Arial, Helvetica, sans-serif"><?php echo $ownername?></div>  
        <center><div style="border-top: solid 1px black;padding-top: 5px;width:900px;"></div></center>
        <div class="text-center" style="font-size:25px;font-family:Arial, Helvetica, sans-serif;">DECLARED WINNER</div>   

    </div>
    
    
</body>
</html>

