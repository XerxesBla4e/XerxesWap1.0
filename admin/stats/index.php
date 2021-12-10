<?php

$conn = mysqli_connect("localhost","root","xerxescodes","mydb") or die(mysqli_connect_error($conn));
$query = "SELECT * FROM genres";
$res = mysqli_query($conn,$query) or die(mysqli_error($conn));
$chart_data = '';
while($r = mysqli_fetch_array($res)){
    $chart_data.="{genre:'".$r['name']."',downloads:".$r['downloads']."},";
}
$chart_data = substr($chart_data,0,-2);

//",purchase:".$r['purchase'].",sale:".$r['sales'].
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
<div class="container" style="width:900px;">
    <h2 align="center">XERXESWAP</h2>
      <h3 align="center">MOST DOWNLOADED GENRES</h3>
      <br /> <br />
      <div id="chart"></div>
      <br /> <br />
</div>
</body>
</html>

<script>
Morris.Bar({
    element: 'chart',
    data:[<?php echo $chart_data; ?>}],
    xkey:'genre',
    ykeys:['downloads'],
    labels:['downloads'],
    hideHover:'auto',

});
</script>