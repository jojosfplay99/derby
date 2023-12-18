<?php

include '../db.php';

$id = $_GET['id'];

$query = mysqli_query($con,"SELECT * FROM additional_bet WHERE match_id = '$id'");
while($row = mysqli_fetch_array($query)){
    
$id = $row['id'];
$match_id = $row['match_id'];
$transnum = $row['transnum'];
$bet = $row['bet'];
$match_type = $row['match_type'];
$date_created = $row['date_created'];

$formatter = new NumberFormatter('en_PH',  NumberFormatter::CURRENCY);
$bet = $formatter->formatCurrency($bet, 'PHP');

}

               
$query3 = mysqli_query($con,"SELECT * FROM matching WHERE id = '$match_id'");
while($row3 = mysqli_fetch_array($query3)){
    $fight_no = $row3['fight_no'];
    $schedule_code = $row3['schedule_code'];
    $beta_a = 0;
    $beta_b = 0;    
}


$query4 = mysqli_query($con,"SELECT SUM(bet) as sum FROM additional_bet WHERE match_id = '$match_id' AND match_type = 'match_a'");
while($row4 = mysqli_fetch_array($query4)){
    $sum1 = $row4['sum'];    
}

$query5 = mysqli_query($con,"SELECT SUM(bet) as sum FROM additional_bet WHERE match_id = '$match_id' AND match_type = 'match_b'");
while($row5 = mysqli_fetch_array($query5)){
    $sum2 = $row5['sum'];    
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
        <h2 class="text-center" id="header">BET SLIP</h2>
        
        <hr>

        <div class="row">
            <div class="col">
                <div class="d-flex flex-column">
                    <div class="text-start flex-fill" id="data"><b>FIGHT NO: </b><span style="border-bottom: solid 1px;"><?php echo $fight_no;?></span></div>                         
                    <div class="text-start flex-fill" id="data"><b>DATE: </b><span style="border-bottom: solid 1px;"><?php echo $date_created;?></span></div>
                </div>  
            </div>
            <div class="col">
                <div class="d-flex flex-column">
                    <div class="text-start flex-fill" id="data"><b>TRANSNUM: </b><span style="border-bottom: solid 1px;"><?php echo $transnum;?></span></div>
                    <div class="text-start flex-fill" id="data"><b>FIGHT CODE: </b><span style="border-bottom: solid 1px;"><?php echo $schedule_code;?></span></div>
                </div>
            </div>
        </div>
         
        
        
        <br>
        

        <div class="card">
        <div class="card-header">
            Summary
        </div>
        <div class="card-body">
        <div class="d-flex flex-row">
            <div class="flex-fill">
                <table class="table table-bordered" style="width:100%;font-size:12px;font-weight:bolder">
                    <tr>                            
                        <th class="text-center" colspan="2" style="width: 20%;" >MATCH A</th>
                    </tr>
                    <tr>
                        <th>TRANSNUM</th>
                        <th>BET</th>                            
                    </tr>
                    <tr>
                        <?php
                                    
                        $query2 = mysqli_query($con,"SELECT * FROM additional_bet WHERE match_id = '$match_id' AND match_type = 'match_a'");
                        while($row2 = mysqli_fetch_array($query2)){
                            $bet_1 = $row2['bet'];
                            $bet_1_1 = $row2['bet'];

                            $formatter = new NumberFormatter('en_PH',  NumberFormatter::CURRENCY);
                            $bet_1 = $formatter->formatCurrency($bet_1, 'PHP');
                            
                            echo "<tr>";
                            echo "<td>".$row2['transnum']."</td>";                
                            echo "<td>".$bet_1."</td>";                
                            echo "</tr>";
                        }                                                               
                        ?>
                    </tr>                    
                </table>
            </div>
            <div class="flex-fill">
                <table class="table table-bordered" style="width:100%;font-size:12px;font-weight:bolder">
                    <tr>                            
                        <th class="text-center" colspan="2" style="width: 20%;" >MATCH B</th>
                    </tr>
                    <tr>
                        <th>TRANSNUM</th>
                        <th>BET</th>                            
                    </tr>
                    <tr>
                        <?php
                                    
                        $query2_1 = mysqli_query($con,"SELECT * FROM additional_bet WHERE match_id = '$match_id' AND match_type = 'match_b'");
                        while($row2_1 = mysqli_fetch_array($query2_1)){
                            $bet_1 = $row2_1['bet'];
                            $bet_1_2 = $row2_1['bet'];

                            $formatter = new NumberFormatter('en_PH',  NumberFormatter::CURRENCY);
                            $bet_1 = $formatter->formatCurrency($bet_1, 'PHP');
                            
                            echo "<tr>";
                            echo "<td>".$row2_1['transnum']."</td>";                
                            echo "<td>".$bet_1."</td>";                
                            echo "</tr>";
                        } 

                        ?>
                    </tr>
                </table>
            </div>
        </div>
            <table class="table table-bordered" style="width:100%;font-size:12px;font-weight:bolder">
                <tr>
                    <th colspan="2">MATCH A</th>
                    <th colspan="2">MATCH B</th>
                </tr>                                
                <tr>
                    <td>TOTAL:</td>
                    <td>
                        <?php   
                        $formatter = new NumberFormatter('en_PH',  NumberFormatter::CURRENCY);
                        echo $formatter->formatCurrency($sum1, 'PHP');                      
                        ?>
                    </td>
                    <td>TOTAL:</td>
                    <td>
                        <?php
                        $formatter = new NumberFormatter('en_PH',  NumberFormatter::CURRENCY);
                        echo $formatter->formatCurrency($sum2, 'PHP');              
                        //echo $sum2;
                        ?>
                    </td>
                </tr>
            </table>
            <div class="card-footer text-center">
            <?php        
                if($sum1 > $sum2){                    
                    $final = (int)$sum1 - (int)$sum2;                
                }else{
                    $final =  (int)$sum2 - (int)$sum1;                
                }                

                $formatter = new NumberFormatter('en_PH',  NumberFormatter::CURRENCY);
                $final = $formatter->formatCurrency($final, 'PHP');

            ?>
            <h4 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DIFFERENCE: <?php echo $final;?></h4>
            
            </div>
        </div>
        </div>

        
                                                        
    </div>
    
    
</body>
</html>

