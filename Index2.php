<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VLE</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src = "js/chart.js"></script>


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src = "chart.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>

<div class="container" style= "width:90%">
    <!-- Header Row -->
    <div class="row" id="fixed-container">
            <div class="col-md-3">
              <img  src="images/children/smiley01.jpg" alt="logo" width="106px" height="106px" /> 
            </div>
            <div class="col-md-3">
                <div class="row" id="fixed-container">
                <h3>Name</h3>
                </div>
                <div class="row" id="fixed-container">
                <h3>D.o.B</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row weeklyChart1" id="filtered-chart">
                
                </div>
            </div>
    </div>
    <div class="row" id="fixed-container">
    	<div class="col-md-5">
        	<div id="bar-chart">
                
            </div>
        </div>
        <div class="col-md-3">
        	
        </div>
    </div>

</div> 

	<div id="pie-chart" name="pie-chart">
                
            </div>
</body>
</html>
<script type="text/javascript">
google.charts.load("current", {packages:["corechart"]});
    //google.charts.setOnLoadCallback(drawAttendenceChart);
	google.charts.setOnLoadCallback(drawPieChart);
    function drawAttendenceChart() {
      var jsonData = $.ajax({
		  url: "attendence.php",
		  dataType:"json",
		  async: false
		  }).responseText;
	   
		// Create our data table out of JSON data loaded from server.
		var data = new google.visualization.DataTable(jsonData);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Attendence",
        width: 600,
        height: 450,
        bar: {groupWidth: "50%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("filtered-chart"));
      chart.draw(view, options);
  }
	function drawActivityChart() {
      var data = google.visualization.arrayToDataTable([
        ['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General',
         'Western', 'Literature', { role: 'annotation' } ],
        ['2010', 10, 24, 20, 32, 18, 5, ''],
        ['2020', 16, 22, 23, 30, 16, 9, ''],
        ['2030', 28, 19, 29, 30, 12, 13, '']
      ]);

      var options = {
        width: 400,
        height: 300,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true
      };
	  
	  var options_fullStacked = {
          isStacked: 'percent',
          height: 300,
          legend: {position: 'top', maxLines: 3},
          hAxis: {
            minValue: 0,
            ticks: [0, .3, .6, .9, 1]
          }
        };


      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var chart = new google.visualization.BarChart(document.getElementById("bar-chart"));
      chart.draw(view, options_fullStacked);
  }
	function drawPieChart() {

        var jsonData = $.ajax({
		  url: "data.php",
		  dataType:"json",
		  async: false
		  }).responseText;
	   
		// Create our data table out of JSON data loaded from server.
		var data = new google.visualization.DataTable(jsonData);

        // Set options for pie chart.
        var options = {title:'Activities throughout Year',
						'width':1100,
                     'height':1100};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
        chart.draw(data, options);
      }
/*$(window).resize(function(){
  drawAttendenceChart();
  drawPieChart();
    drawActivityChart();
});*/
  </script>

    