<?php

include '../db.php';

$schedule_code = $_GET['schedule_code'];
$query = mysqli_query($con,"SELECT * FROM schedule WHERE schedule_code = '$schedule_code'");
while($row = mysqli_fetch_array($query)){
    
$title = $row['title'];
$promoter = $row['promoter'];
$location = $row['location'];
$date_schedule = date_create($row['date_schedule']);
$numbers = $row['number_fights'];
$type = $row['type'];
$prize = $row['prize'];
$schedule_code = $row['schedule_code'];

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../datatables/datatables.min.css">
    <script src="../../../jquery/jquery-3.6.3.min.js"></script>
    <script src="../../../datatables/datatables.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/tableToExcel.js"></script>
    <style>
        #header{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 20px;
        }
        #data{
            font-family:'Times New Roman', Times, serif;
            font-size: 18px;
        }
        @media print {
            #excel_button {
                display: none;
            }
            #print_button {
                display: none;
            }
        }
    </style>
</head>
<body>    
    <div class="container-fluid">

        <h2 class="text-center" style="font-family:'Times New Roman', Times, serif;"><?php echo strtoupper($title);?></h2>
        <h2 class="text-center" style="font-family:'Times New Roman', Times, serif;"><?php echo $promoter;?> - NEW BAYBAYON COCKPIT ARENA</h2>
        <h2 class="text-center" style="font-family:'Times New Roman', Times, serif;"><?php echo strtoupper(date_format($date_schedule,"F d, Y"))?></h2>
        <hr>
        <div class="container-fluid"  style="break-inside: auto;">
        <br><br>  
        <h2 class="text-center" style="font-family:serif;">SCORE CARD</h2>
            <table class="table table-bordered table-responsive table-stripped display" id="table1" style="font-size:12px;border:solid 1px;">                                                
            <tr class="table-primary">
                <th>REGISTRATION NO</th>
                <th>ENTRY NAME</th>
                <th>OWNER NAME</th>
                <?php
                    $query4 = mysqli_query($con,"SELECT number_fights FROM schedule WHERE schedule_code = '$schedule_code'");            
                    while($row4 = mysqli_fetch_array($query4)){                        
                        $maximum = $row4['number_fights'];                        
                        for($i = 0; $i < $maximum; $i++){
                            $fight = $i + 1;
                            echo "<th>FIGHT NO ".$fight."</th>";
                        }
                                           
                    }                                    
                ?>
                <th>TOTAL</th>
            </tr>
            <?php
                $total_value = mysqli_query($con,"SELECT id,SUM(score) as score_sum, schedule_code,ownername,farm_name,regno FROM entry WHERE schedule_code = '$schedule_code' GROUP BY regno ORDER BY score_sum DESC");                                           
                while($row_total = mysqli_fetch_array($total_value)){
                    
                    $regno1 = $row_total['regno'];
                    unset($final);
                    echo "<tr>";     
                    echo "<td>".$regno1."</td>";
                    echo "<td>".$row_total['farm_name']."</td>";
                    echo "<td>".$row_total['ownername']."</td>";
                    $data_match = mysqli_query($con,"SELECT * FROM matching WHERE regno_a LIKE '$regno1' OR regno_b LIKE '$regno1' ORDER BY fight_no ASC");
                    while($row_data = mysqli_fetch_array($data_match)){
                        $regno_a1 = $row_data['regno_a'];
                        $regno_b1 = $row_data['regno_b'];                                                
                        
                        if($regno_a1 == $regno1){
                            $final[] = $row_data['status1'];
                            //echo "<td>".$final."</td>";
                        }
                        else if($regno_b1 == $regno1){
                            $final[] = $row_data['status2'];
                            //echo "<td>".$final."</td>";
                        }  
                        else{
                            $final[] = 0;
                        }                                   
                    }

                    $final_count = count($final);
                    if($final_count == $maximum){
                        for($i = 0; $i < $maximum; $i++){                        
                            echo "<td>".$final[$i]."</td>";
                        }
                    }
                    else{
                        $difference = $maximum - $final_count;     
                        $continue = $final_count + 1;                        
                        for($i = 0; $i < $maximum; $i++){                        
                            if(isset($final[$i]) == '1'){
                                echo "<td>".$final[$i]."</td>";
                            }
                            else{
                                echo "<td>  </td>";
                            }
                            
                            
                        }
                    }

                    
                    $sum_array = array_sum($final);
                    echo "<td>".$sum_array."</td>";
                    
                }                  
            ?>    
            </table>
        </div>
        <br>               
    </div> 
    <button class="btn btn-primary" id="excel_button">Excel</button>   
    <button class="btn btn-success" id="print_button" onclick="window.print()">Print</button>            
</body>
<script>
    $(document).ready(function(){
        $("#excel_button").click(function () {
            let table = document.getElementsByTagName("table");
            console.log(table);
            
            TableToExcel.convert(table[0], {
                name: `FINAL RESULT.xlsx`,
                sheet: {
                    name: 'derbymanagement'
                }
            });
        });
    })
</script>
</html>

