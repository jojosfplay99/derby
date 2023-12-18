<?php

$data = $_GET['entrance_num'];

include '../db.php';

$query = mysqli_query($con,"SELECT * FROM entrance WHERE entrance_num = '$data'");
while($row = mysqli_fetch_array($query)){
    $status = $row['status'];
    if($status == 'GENERAL ADMISSION'){
        $image = "img/qr1.png";
    }
    else{
        $image = "img/qr2.png";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="../../../jquery/jquery-3.6.3.min.js"></script>  
    <script type="text/javascript" src="../../../jquery/jquery.maskMoney.min.js"></script>    
    <script type="text/javascript" src="../../../jquery_ui/jquery-ui.min.js"></script>   
    <!--<script type="text/javascript" src="../../jquery/jquery-qrcode.js"></script>  -->
    <script type="text/javascript" src="../../../jquery/jquery.qrcode.min.js"></script>       
    <script type="text/javascript" src="../../../jquery/html5-qrcode.min.js"></script> 
    <style>
        canvas{
            position:absolute;
            top:120px;
            left: 90px;
            width:130px;
            height:130px;
            background-color: white;
            padding: 10px;
        }
        span{
            position:absolute;
            top:250px;
            left: 87px;            
            font-size:20px;
            font-weight:bolder;
            font-family: 'Courier New', Courier, monospace;
            color:white;
        }
    </style>
</head>
<body>
    <input type="hidden" id="entrance_num" value="<?php echo $data;?>">
    <img src="<?php echo $image;?>" style="width:1200px;">    
    <div class="text-center round-radious" id="qrcode"></div> 
    <span class="badge bg-primary" id="result1"></span>

    <script>
        $(document).ready(function(){
            var data = $('#entrance_num').val();
            $('#qrcode').qrcode(data);
            $('#result1').html("<br>"+data);
        });
        
    </script>
</body>
</html>

