<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
		var data = new google.visualization.DataTable();
		data.addColumn('date', 'Date');
		data.addColumn('number', '小老鼠');
		data.addColumn('number', '小肉包');

		data.addRows([
			<?php include "getData.php"; ?>
		]);

		var options = {
			hAxis: {
				title: '日期'
			},
			vAxis: {
				title: '体重',
				viewWindow:{
                	min: 350
                }
			},
			width: $(window).width() * 0.8, 
			height:  $(window).height() * 0.8,
			//pointSize: 20,
			//pointShape: 'square'
		};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html> 