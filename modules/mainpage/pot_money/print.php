<?php

$data = $_GET['entrance_num'];

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
</head>
<body>
    <input type="hidden" id="entrance_num" value="<?php echo $data;?>">
    <div class="text-center" id="qrcode"></div> 

    <script>
        $(document).ready(function(){
            var data = $('#entrance_num').val();
            $('#qrcode').qrcode(data);
        });
        
    </script>
</body>
</html>

