
<?php
$conn = mysqli_connect("localhost","root","xerxescodes","mydb") or die(mysqli_connect_error($conn));

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Genre', 'Downloads'],
         
         <?php
            $query = "SELECT * FROM genres";
            $res = mysqli_query($conn,$query) or die(mysqli_error($conn));
            while($r = mysqli_fetch_array($res)){
              echo "['".$r['name']."',".$r['downloads']."],";
            }
          ?>
        ]);

        var options = {
          title: 'Genres and Downloads',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>