<html>
<head>
    <meta charset="UTF-8">
    <title>Д Е Д Л А Й Н</title>
    <!--    <link rel="stylesheet" href="../css/commonStylesheet.css">-->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <script src="countdown.js"></script>

</head>
<body
    style="font-family: Verdana; text-align: center; background-image: url(../img/collage.jpg); background-attachment: fixed; background-size: cover;">

<div align="center" style="background-color: rgba(240,240,240,0.8); display: inline-block;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    overflow: hidden;
    width: 55%;
    /*min-width: 400px;*/
    min-width: 240px;
    margin-top: 13%;
    margin-bottom: 15px;
    padding: 25px;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.5);">
    <h1 align="center" style="margin: 20px 20px;">ДО<br>Д И П Л О М А</h1>
    <h1 align="center" id="count">fgsfds</h1>
</div>
<script>
    var clock = document.getElementById("count");
    var targetDate = new Date(2016, 5, 18); // Jan 1, 2050;

    clock.innerHTML = countdown(targetDate).toString();
    clock.innerHTML = countdown(targetDate).toString();
    setInterval(function () {
        clock.innerHTML = countdown(targetDate).toString();
    }, 1000);
</script>
</body>
</html>