<?php
  $piggieImages = array_merge(glob("images/rouyuan/*.jpg"), glob("images/roubao/*.jpg"));
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roubao = $_POST["roubao"];
    $laoshu = $_POST["laoshu"];

    $line = date("Y,n,j,H,i").",".$roubao.",".$laoshu;
    $myfile = file_put_contents('PiggieWeight/weight.dat', $line.PHP_EOL , FILE_APPEND | LOCK_EX);

    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title> Xiaoye's Home Page</title>
  <script src="photo-gallery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://www.google.com/jsapi"></script>
  <link rel="stylesheet" href="main.css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);

    $(window).resize(function(){
      drawChart();
    });

    $(document).ready(function(){
      $('.nav-pills a[href="#weight"]').on('shown.bs.tab', function () {
        drawChart();      
      });
    });

    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('date', '日期');
      data.addColumn('number', '小馄饨');
      data.addColumn('number', '小元宵');

      data.addRows([
        <?php include "getData.php"; ?>
      ]);

      var options = {
        hAxis: {
          title: '日期'
        },
        vAxis: {
          title: '体重',
        },
      };

      new google.visualization.LineChart(document.getElementById('visualization')).draw(data, options);
    }
  </script>

</head>

<body>
  <div class="main-content">
    <div id="navbar">
      <h3>Xiaoye's Home Page</h3>
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#gallery">Piggy Gallery</a></li>
        <li><a id="weightTab" data-toggle="pill" href="#weight">Weight Monitor</a></li>
        <li><a data-toggle="pill" href="#assignemnt">Assignment</a></li>
      </ul>
    </div>

    <div class="tab-content">
      <div id="assignemnt" class="tab-pane fade">
        <h4>Xiaoye's Web Programming class assignemnts.</h4>
        <ul>
        <li><a href="HW1/index.html" target="_blank">Assinment 1</a> - A "Guinea Pig Heaven" page with pretty pictures of my piggies</li>
        <li><a href="HW2/tmnt.html" target="_blank">Assinment 2</a> - A fancy movie review page with css style sheet</li>
        <li><a href="HW3/index.php" target="_blank">Assinment 3</a> - A php page contains three php coding test result</li>
        <li><a href="HW4/main.php" target="_blank">Assinment 4</a> - A movie view page site with multiple moive info</li>
        <li><a href="HW5/guestbook.php" target="_blank">Assinment 5</a> - A guestbook application built on php and database</li>
        <li><a href="HW6/index.html" target="_blank">Assinment 6</a> - A javascript challenge with 3 tasks</li>
        <li><a href="HW7/main.php" target="_blank">Assinment 7</a> - Movie review site with cookie enabled</li>
        </ul>
      </div>

      <div id="gallery" class="tab-pane fade in active">
        <ul class="row">
        <?php
        foreach ($piggieImages as $image) {
        ?>                
          <li class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <img class="img-responsive" src="<?= $image?>">
          </li>            
        <?php                
        }
        ?>
        <ul>
      </div>

      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">         
            <div class="modal-body">                
            </div>
          </div>
        </div>
      </div>

      <div id="weight" class="tab-pane fade">
        <div id="weight-form">
          <form  action="index.php" method="POST">
            小元宵体重: 
            <input type="text" name="laoshu"><br><br>
            小馄饨体重: 
            <input type="text" name="roubao"><br><br>
            <input type="submit" value="提交">  
          </form>
        </div>
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-1">
          </div>
          <div class="col-lg-8 col-md-8 col-sm-10">
            <div id="visualization" class="chart"></div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-1">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>