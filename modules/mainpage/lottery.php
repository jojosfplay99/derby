
<html>
<head>
    <title>Lottery</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <meta name="format-detection" content="telephone=no" />
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        .lotterybox{
            height: 100%;
        }
    </style>
    <link rel="stylesheet" href="../../dist/lottery.min.css" />
    <script src="../../jquery/jquery-3.6.3.min.js"></script>
    <script src="../../dist/lottery.min.js"></script>
</head>

<body>
    <div class="lotterybox"></div>
    

    <!-- ROCK ON -->
    <script>
            $.lottery({
                el: '.lotterybox',
                api: 'lottery/sample-data.json',
                once: false,
                subtitle: "company",
                confetti: false,   
                // desc: "title",
                timeout: 20,
                number: 3
            });
    </script>

</body>

</html>