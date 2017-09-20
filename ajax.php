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
<div id="attendence-chart">
                
            </div>
<div id="pie-chart" name="pie-chart">
                
            </div>
</body>
</html>
<script type="text/javascript">
google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawAttendenceChart);
	google.charts.setOnLoadCallback(drawPieChart);

	function drawAttendenceChart() {
      var jsonData = $.ajax({
		  url: 'ajax2.php',
		  dataType:"json",
		  type: 'post',
		  data: { "func": "bar","dat":'Shantel'},
		  async: false
		  }).responseText;
		  
	var obj = JSON.parse(jsonData);
	   //alert(obj[0]);
	   //alert(obj[1]);
	   //alert(obj[2]);alert(obj[3]);
	   var data = google.visualization.arrayToDataTable([
        ["Term", "Attendence", { role: "style" } ],
        ["Term 1", obj[0], "#b87333"],
        ["Term 2", obj[1], "silver"],
        ["Term 3", obj[2], "gold"],
        ["Term 4", obj[3], "color: #e5e4e2"]
      ]);
	   
	   
	   
	   


      //var view = new google.visualization.DataView(data);
      //view.setColumns([0, 1,
                      // { calc: "stringify",
                       //  sourceColumn: 1,
//type: "string",
                        // role: "annotation" },
                       //2]);

      var options = {
        title: "Attendence",
        width: 600,
        height: 450,
        bar: {groupWidth: "50%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("attendence-chart"));
      chart.draw(data, options);
  }
	function drawPieChart() {
        var jsonData = $.ajax({
		  url: 'ajax2.php',
		  dataType:"json",
		  type: 'post',
		  data: { "func": "pie","dat":'Tara'},
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
  </script>

    