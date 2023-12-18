<?php

include '../db.php';

$id = $_GET['id'];

$query3 = mysqli_query($con,"SELECT * FROM matching WHERE id = '$id'");
while($row3 = mysqli_fetch_array($query3)){
    $fight_no = $row3['fight_no'];
    $schedule_code = $row3['schedule_code'];
    $beta_a = 0;
    $beta_b = 0; 
    $winner_id = $row3['winner_id'];
    $match_a = $row3['match_a'];
    $match_b = $row3['match_b'];
}

$query_match_a = mysqli_query($con,"SELECT * FROM entry WHERE id = '$match_a'");
while($row_match_a = mysqli_fetch_array($query_match_a)){
    $match_a_name = $row_match_a['farm_name'];
}

$query_match_b = mysqli_query($con,"SELECT * FROM entry WHERE id = '$match_b'");
while($row_match_b = mysqli_fetch_array($query_match_b)){
    $match_b_name = $row_match_b['farm_name'];
}

$query = mysqli_query($con,"SELECT * FROM additional_bet WHERE match_id = '$id'");
if(mysqli_num_rows($query) == 0){
    $bet = "0";
    $sum1 = "0";
    $sum2 = "0";
}
else{
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

    $query4 = mysqli_query($con,"SELECT SUM(bet) as sum FROM additional_bet WHERE match_id = '$match_id' AND match_type = 'match_a'");
    while($row4 = mysqli_fetch_array($query4)){
        $sum1 = $row4['sum'];    
    }

    $query5 = mysqli_query($con,"SELECT SUM(bet) as sum FROM additional_bet WHERE match_id = '$match_id' AND match_type = 'match_b'");
    while($row5 = mysqli_fetch_array($query5)){
        $sum2 = $row5['sum'];    
    }
    
}

if($sum1 > $sum2){    
    $match_a_status = "<h5 style='color:red;'>INILOG</h5>";
    $match_b_status = "<h5 style='color:blue;'>BIYA</h5>"; 
    $final2 = $sum1 - $sum2;                    
}
else{
    $match_b_status = "<h5 style='color:red;'>INILOG</h5>";
    $match_a_status = "<h5 style='color:blue;'>BIYA</h5>";    
    $final2 = $sum2 - $sum1;
}

$ariba_a = $sum1 * .10;   
$ariba_b = $sum2 * .10;

if($ariba_a > $ariba_b){
    $monton = $ariba_a - $ariba_b;
}
else{
    $monton = $ariba_b - $ariba_a;
}

$tax = "150";




$formatter = new NumberFormatter('en_PH',  NumberFormatter::CURRENCY);

               
         


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
        
        <?php
        if($winner_id == $match_a){
            echo "#side_b{display:none}" ;
        }            
        else{
            echo "#side_a{display:none}" ;
        }
        
        ?>
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
                <div class="flex-fill" id="side_a">
                    <table class="table table-bordered mb-3" style="width:100%;font-size:12px;font-weight:bolder">
                        <tr>                            
                            <th class="text-center" colspan="2" style="width: 20%;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" ><?php echo $match_a_status?></th>
                        </tr>
                        <tr>                            
                            <th class="text-center" colspan="2" style="width: 20%;" >MATCH A (<?php echo $match_a_name?>)</th>
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
                        <tr>
                            <td>TOTAL</td>
                            <td>
                                <?php
                                $formatter = new NumberFormatter('en_PH',  NumberFormatter::CURRENCY);
                                echo $formatter->formatCurrency($sum1, 'PHP');              
                                //echo $sum2;
                                ?>
                            </td>
                        </tr>                                                                                          
                    </table>

                    <div class="text-center d-flex flex-column mb-3">
                        <div style="font-size: 12px;font-family:'Times New Roman', Times, serif">BET DIFFERENCE</div>
                        <div style="font-size: 18px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                            <?php 
                                echo $formatter->formatCurrency($final2, 'PHP')
                            ?>
                        </div>
                    </div>
                    <hr class="mb-3">
                    <div class="mb-3">&nbsp;</div>

                    <table class="table table-bordered" style="width:100%;font-size:12px;font-weight:bolder">                        
                        <tr style="color:red">
                            <td>ARIBA***</td>
                            <td><?php echo $formatter->formatCurrency($ariba_a, 'PHP');?></td>  
                        </tr>
                        <?php
                        
                        if($match_a_status == "<h5 style='color:blue;'>BIYA</h5>"){
                            echo "<tr style='color:red'><td>MONTON***</td><td>".$formatter->formatCurrency($monton, 'PHP')."</td></tr>";
                            $total_winnings_match_a2 = $ariba_a + $monton + $tax;
                            $total_winnings_match_a = $sum1 - $total_winnings_match_a2;
                        }
                        else{
                            $total_winnings_match_a2 = $ariba_a + $tax;
                            $total_winnings_match_a = $sum1 - $total_winnings_match_a2;
                        }
                        

                        ?>
                        <tr style="color:red">
                            <td>TAX***</td>
                            <td><?php echo $formatter->formatCurrency($tax, 'PHP');?></td>  
                        </tr>   
                        <tr style="background-color:lightblue">
                            <td>TOTAL DEDUCTION***</td>
                            <td><?php echo $formatter->formatCurrency($total_winnings_match_a2, 'PHP');?></td>  
                        </tr>                    
                    </table>
                    <div class="text-center d-flex flex-column">
                        <div style="font-family:'Times New Roman', Times, serif">TOTAL WINNINGS</div>
                        <div style="font-size: 24px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><?php echo $formatter->formatCurrency($total_winnings_match_a, 'PHP')?></div>
                    </div>
                </div>


                <div class="flex-fill" id="side_b">
                    <table class="table table-bordered" style="width:100%;font-size:12px;font-weight:bolder">
                        <tr>                            
                            <th class="text-center" colspan="2" style="width: 20%;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" ><?php echo $match_b_status?></th>
                        </tr>
                        <tr>                            
                            <th class="text-center" colspan="2" style="width: 20%;" >MATCH B (<?php echo $match_b_name?>)</th>
                        </tr>
                        <tr>
                            <th width="70%">TRANSNUM</th>
                            <th width="30%">BET</th>                            
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
                        <tr style="background-color: lightblue;">
                            <td>TOTAL</td>
                            <td>
                                <?php
                                    $formatter = new NumberFormatter('en_PH',  NumberFormatter::CURRENCY);
                                    echo $formatter->formatCurrency($sum2, 'PHP');              
                                    //echo $sum2;
                                ?>
                            </td>
                        </tr>                                                                                                   
                    </table>

                    <div class="text-center d-flex flex-column mb-3">
                        <div style="font-size: 12px;font-family:'Times New Roman', Times, serif">BET DIFFERENCE</div>
                        <div style="font-size: 18px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                            <?php 
                                echo $formatter->formatCurrency($final2, 'PHP')
                            ?>
                        </div>
                    </div>
                    <hr class="mb-3">
                    <div class="mb-3">&nbsp;</div>
                    <table class="table table-bordered" style="width:100%;font-size:12px;font-weight:bolder">
                        <tr>
                            <td class="text-center" colspan="2">DEDUCTIONS</td>
                        </tr>                    
                        <tr style="color:red">
                            <td width="70%">ARIBA***</td>
                            <td width="30%"><?php echo $formatter->formatCurrency($ariba_b, 'PHP');?></td>  
                        </tr>
                        <?php
                        
                        if($match_b_status == "<h5 style='color:blue;'>BIYA</h5>"){
                            echo "<tr style='color:red'><td>MONTON***</td><td>".$formatter->formatCurrency($monton, 'PHP')."</td></tr>";
                            $total_winnings_match_b2 = $ariba_b + $monton + $tax;
                            $total_winnings_match_b = $sum2 - $total_winnings_match_b2;
                        }
                        else{                        
                            $total_winnings_match_b2 = $ariba_b + $tax;
                            $total_winnings_match_b = $sum2 - $total_winnings_match_b2;                        
                        }

                        ?>
                        <tr style="color:red">
                            <td>TAX***</td>
                            <td><?php echo $formatter->formatCurrency($tax, 'PHP');?></td>  
                        </tr> 
                        <tr style="background-color:lightblue">
                            <td>TOTAL DEDUCTION***</td>
                            <td><?php echo $formatter->formatCurrency($total_winnings_match_b2, 'PHP');?></td>  
                        </tr> 
                    </table>
                    <div class="text-center d-flex flex-column">
                        <div style="font-family:'Times New Roman', Times, serif">TOTAL WINNINGS</div>
                        <div style="font-size: 24px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                            <?php 
                                echo $formatter->formatCurrency($total_winnings_match_b, 'PHP')
                            ?>
                        </div>
                    </div>
                </div>
            </div>                      
        </div>
        </div>

        
                                                        
    </div>
    
    
</body>
</html>

