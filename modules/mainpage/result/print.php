<?php

include '../db.php';

$data1 = $_GET['data1'];


$query = mysqli_query($con,"SELECT * FROM bet_slip WHERE matching_id = '$data1'");
while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
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
    $masyada = $row['masyada'];
}    
  
$total_deductions = $ariba + $monton + $tax;

$total_winnings = $pareha - $total_deductions;


if($status == 'BIYA'){
    $final_dyes = $masyada;
    $final_nuybe = $masyada;
    $final_tag_upat = $masyada;
    $final_dyes_says = $masyada;
    $final_dyes_sete = $masyada;
    $grand_total1 = $masyada + $total_winnings;
    $grand_total2 = $masyada + $total_winnings;
    $grand_total3 = $masyada + $total_winnings;
    $grand_total4 = $masyada + $total_winnings;
    $grand_total5 = $masyada + $total_winnings;
}
else{
    $dyes = $masyada * .20;
    $final_dyes = $masyada - $dyes;
    $grand_total1 = $final_dyes + $total_winnings;

    $nuybe = $masyada * .10;
    $final_nuybe = $masyada - $nuybe;
    $grand_total2 = $final_nuybe + $total_winnings;

    $tag_upat = $masyada * .25;
    $final_tag_upat = $masyada - $tag_upat;
    $grand_total3 = $final_tag_upat + $total_winnings;

    $dyes_says = $masyada * .40;
    $final_dyes_says = $masyada - $dyes_says;
    $grand_total4 = $final_dyes_says + $total_winnings;

    $dyes_sete = $masyada * .30;
    $final_dyes_sete = $masyada - $dyes_sete;
    $grand_total5 = $final_dyes_sete + $total_winnings;
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="../../../jquery/jquery-3.6.3.min.js"></script>  
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
            #masyada, #change_value, #label_masyada, #monton_button{
                display: none !important;
            }            
        }      
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center" id="header">WINNER SLIP</h2>
        <input type="hidden" id="id" value="<?php echo $id?>">
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
            <tr>
                <td width="30%">DEPERENSYA</td>
                <td width="70%"><?php echo "₱ ".number_format($deperensya, 2, '.', ',');?></td>
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
        
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="masyada" id="masyada" placeholder="name@example.com" value="<?php echo $masyada?>">
                        <label id="label_masyada" for="masyada">Masyada</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="monton_button" id="monton_button" placeholder="name@example.com" value="<?php echo $monton?>">
                        <label id="label_masyada" for="masyada">Monton</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating" id="masyada">
                        <select class="form-select" id="masyada_button" name="masyada_button" aria-label="Floating label select example">
                            <option value="default" selected>Default</option>
                            <option value="1">DYES</option>
                            <option value="2">NUYBE</option>
                            <option value="3">TAG-UPAT</option>
                            <option value="4">DYES SETE</option>
                            <option value="5">DYES SAYS</option>
                        </select>
                        <label for="floatingSelect">Works with selects</label>
                    </div>
                </div>
                <div class="col-1">
                    <button class="btn btn-primary form-control" id="change_value">CHANGE</button>
                </div>
            </div>             
        <br><br><br>

        <div id="mas1" style="display: none !important;">
            <h3 class="text-center" style="font-size:30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DYES</h3>
            <table class="table table-responsive table-bordered">
                <tr>
                    <td width="30%">DEPERENSYA</td>
                    <td width="70%"><?php echo "₱ ".number_format($deperensya, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td width="30%">MASYADA</td>
                    <td width="70%"><?php echo "₱ ".number_format($masyada, 2, '.', ',');?></td>
                </tr>
                <tr style="background-color:gray;color:white;">
                    <td width="30%">TOTAL WINNINGS</td>
                    <td width="70%"><?php echo "₱ ".number_format($final_dyes, 2, '.', ',');?></td>
                </tr>
                <tr style="background-color:#0275d8;color:white;">
                    <td width="30%">GRAND TOTAL WINNINGS</td>
                    <td width="70%"><?php echo "₱ ".number_format($grand_total1, 2, '.', ',');?></td>
                </tr>            
            </table>
        </div>
        <div id="mas2" style="display: none !important;">
            <h3 class="text-center" style="font-size:30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">NUYBE</h3>
            <table class="table table-responsive table-bordered">
                <tr>
                    <td width="30%">DEPERENSYA</td>
                    <td width="70%"><?php echo "₱ ".number_format($deperensya, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td width="30%">MASYADA</td>
                    <td width="70%"><?php echo "₱ ".number_format($masyada, 2, '.', ',');?></td>
                </tr>
                <tr style="background-color:gray;color:white;">
                    <td width="30%">TOTAL WINNINGS</td>
                    <td width="70%"><?php echo "₱ ".number_format($final_nuybe, 2, '.', ',');?></td>
                </tr>
                <tr style="background-color:#0275d8;color:white;">
                    <td width="30%">GRAND TOTAL WINNINGS</td>
                    <td width="70%"><?php echo "₱ ".number_format($grand_total2, 2, '.', ',');?></td>
                </tr>            
            </table>
        </div>
        
        <div id="mas3" style="display: none !important;">
            <h3 class="text-center" style="font-size:30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">TAG-UPAT</h3>
            <table class="table table-responsive table-bordered">
                <tr>
                    <td width="30%">DEPERENSYA</td>
                    <td width="70%"><?php echo "₱ ".number_format($deperensya, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td width="30%">MASYADA</td>
                    <td width="70%"><?php echo "₱ ".number_format($masyada, 2, '.', ',');?></td>
                </tr>
                <tr style="background-color:gray;color:white;">
                    <td width="30%">TOTAL WINNINGS</td>
                    <td width="70%"><?php echo "₱ ".number_format($final_tag_upat, 2, '.', ',');?></td>
                </tr>
                <tr style="background-color:#0275d8;color:white;">
                    <td width="30%">GRAND TOTAL WINNINGS</td>
                    <td width="70%"><?php echo "₱ ".number_format($grand_total3, 2, '.', ',');?></td>
                </tr>            
            </table>
        </div>
            
        <div id="mas4" style="display: none !important;">
            <h3 class="text-center" style="font-size:30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DYES SETE</h3>
            <table class="table table-responsive table-bordered">
                <tr>
                    <td width="30%">DEPERENSYA</td>
                    <td width="70%"><?php echo "₱ ".number_format($deperensya, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td width="30%">MASYADA</td>
                    <td width="70%"><?php echo "₱ ".number_format($masyada, 2, '.', ',');?></td>
                </tr>
                <tr style="background-color:gray;color:white;">
                    <td width="30%">TOTAL WINNINGS</td>
                    <td width="70%"><?php echo "₱ ".number_format($final_dyes_sete, 2, '.', ',');?></td>
                </tr>
                <tr style="background-color:#0275d8;color:white;">
                    <td width="30%">GRAND TOTAL WINNINGS</td>
                    <td width="70%"><?php echo "₱ ".number_format($grand_total4, 2, '.', ',');?></td>
                </tr>            
            </table>
        </div>
            
        <div id="mas5" style="display: none !important;">
            <h3 class="text-center" style="font-size:30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DYES SAYS</h3>
            <table class="table table-responsive table-bordered">
                <tr>
                    <td width="30%">DEPERENSYA</td>
                    <td width="70%"><?php echo "₱ ".number_format($deperensya, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td width="30%">MASYADA</td>
                    <td width="70%"><?php echo "₱ ".number_format($masyada, 2, '.', ',');?></td>
                </tr>
                <tr style="background-color:gray;color:white;">
                    <td width="30%">TOTAL WINNINGS</td>
                    <td width="70%"><?php echo "₱ ".number_format($final_dyes_says, 2, '.', ',');?></td>
                </tr>
                <tr style="background-color:#0275d8;color:white;">
                    <td width="30%">GRAND TOTAL WINNINGS</td>
                    <td width="70%"><?php echo "₱ ".number_format($grand_total5, 2, '.', ',');?></td>
                </tr>            
            </table>
        </div>

        <br><br><br>
        <div class="text-center" style="font-size:50px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;line-height:20px;"><?php echo $farmname?></div>   
        <div class="text-center" style="font-size:40px;font-family:Arial, Helvetica, sans-serif"><?php echo $ownername?></div>  
        <center><div style="border-top: solid 1px black;padding-top: 5px;width:900px;"></div></center>
        <div class="text-center" style="font-size:25px;font-family:Arial, Helvetica, sans-serif;">DECLARED WINNER</div>   

    </div>
        
</body>
<script>
    $('#masyada_button').on('change', function(){
        var masyada = $('#masyada_button').val();
        alert(masyada)
        if(masyada == 1){
            $('#mas2').css("display","none");
            $('#mas3').css("display","none");
            $('#mas4').css("display","none");
            $('#mas1').removeAttr("style");
            $('#mas4').css("display","none");
        }
        else if(masyada == 2){            
            $('#mas2').removeAttr("style");
            $('#mas1').css("display","none");
            $('#mas3').css("display","none");
            $('#mas4').css("display","none");
            $('#mas4').css("display","none");
        }
        else if(masyada == 3){            
            $('#mas3').removeAttr("style");
            $('#mas1').css("display","none");
            $('#mas2').css("display","none");
            $('#mas4').css("display","none");
            $('#mas4').css("display","none");
        }
        else if(masyada == 4){            
            $('#mas4').removeAttr("style");
            $('#mas1').css("display","none");
            $('#mas3').css("display","none");
            $('#mas2').css("display","none");
            $('#mas5').css("display","none");
        }
        else if(masyada == 5){            
            $('#mas5').removeAttr("style");
            $('#mas1').css("display","none");
            $('#mas2').css("display","none");
            $('#mas3').css("display","none");
            $('#mas4').css("display","none");
        }
        else{            
            $('#mas1').css("display","none");
            $('#mas2').css("display","none");
            $('#mas3').css("display","none");
            $('#mas4').css("display","none");
            $('#mas5').css("display","none");
        }        
    })

    $('#change_value').on('click',function(){
        var id = $('#id').val();
        var data1 = $('#masyada').val()
        var data1 = parseFloat(data1);
        var data2 = $('#masyada_button').val();
        var data3 = $('#monton_button').val();
        alert(data1+" "+data2)
        $.ajax({
			method: "POST",
			url: "change_masyada.php",
			data: {id:id,data1:data1,data2:data2,data3:data3},									
				success: function(data) {                                                                          
					alert('SUCCESS!')					                               
				}									
		});
    });
</script>
</html>

