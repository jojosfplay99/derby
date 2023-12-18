<?php

include '../db.php';

$id = $_GET['id'];

$query = mysqli_query($con,"SELECT * FROM schedule WHERE id = '$id'");
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
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/tableToExcel.js"></script>
    <style>
        #header{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 20px;
        }
        #data{
            font-family:'Times New Roman', Times, serif;
            font-size: 14px;
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
        <br>
        <h2 class="text-center" style="font-family:serif;">MATCH LISTING</h2>
        <table class="table table-striped table-bordered" style="font-size:12px;">
            <tr class="table-primary">
                <th style="width:5%;word-wrap:break-word">FIGHT NO</th>
                <th style="width:auto">FARM NAME</th>
                <th style="width:auto">OWNER NAME</th>
                <th style="width:5%">L.B</th>
                <th style="width:5%">W.B</th>
                <th style="width:5%">W.T</th>
                <th style="width:5%"></th>
                <th style="width:5%">W.T</th>
                <th style="width:5%">W.B</th>
                <th style="width:5%">L.B</th>                
                <th style="width:auto">OWNER NAME</th>
                <th style="width:auto">FARM NAME</th>                
            </tr>
            <tr>
                <?php
                
                $query2 = mysqli_query($con,"SELECT * FROM matching WHERE schedule_code = '$schedule_code'");                
                while($row2 = mysqli_fetch_array($query2)){
                    $match_a = $row2['match_a'];
                    $match_b = $row2['match_b'];
                    
                    

                    $query3 = mysqli_query($con,"SELECT * FROM entry WHERE id = '$match_a'");                
                    while($row3 = mysqli_fetch_array($query3)){                    
                        $farm_name1 = $row3['farm_name'];
                        $ownername1 = $row3['ownername'];
                        $wingband1 = $row3['wingband'];
                        $legband1 = $row3['legband'];
                        $weight1 = $row3['weight'];                        
                    }

                    $query4 = mysqli_query($con,"SELECT * FROM entry WHERE id = '$match_b'");                
                    while($row4 = mysqli_fetch_array($query4)){                    
                        $farm_name2 = $row4['farm_name'];
                        $ownername2 = $row4['ownername'];
                        $wingband2 = $row4['wingband'];
                        $legband2 = $row4['legband'];
                        $weight2 = $row4['weight'];                        
                    }

                    echo "<tr>";
                    echo "<td>".$row2['fight_no']."</td>";
                    echo "<td>".$farm_name1."</td>";
                    echo "<td>".$ownername1."</td>";
                    echo "<td>".$wingband1."</td>";
                    echo "<td>".$legband1."</td>";
                    echo "<td>".$weight1."</td>";
                    echo "<td>-VS-</td>";
                    echo "<td>".$weight2."</td>";
                    echo "<td>".$legband2."</td>";
                    echo "<td>".$wingband2."</td>";
                    echo "<td>".$farm_name2."</td>";
                    echo "<td>".$ownername2."</td>";
                    echo "</tr>";

                }
                
                
                ?>
            </tr>
        </table>
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

