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
	<style rel="stylesheet" type="text/css">
		#myProgress {
		width: 70%;
		background-color: white;
		border-style: solid;
		padding:1%;
		margin:5%;
		visibility:hidden;
		border-width:thin;
	}
	.myBar {
		width: 1%;
		height: 3%;
		background-color: white;
		margin-top:5%;
		border-width:thin;
		border-collapse: separate;
		border-spacing:5px;
		border-style: solid;
	}
	.att {
		left-margin:5%;
	}
	#childdata
	{
		margin:2%;
		padding:2%;
		display:grid;
		float:left;
		visibility:hidden;
	}
	#data
	{
		display:flex;
		float:left;
	}
	</style>
</head>

<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-2 col-md-2">
			<div class="form-group" style="margin:2%;display: block;float: left;">
				<input id="txt" class="form-control" style="width:100%;margin-bottom:2%;" />
				<button id="btn" onClick="graph()" class="btn btn-success">Graph</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-2 col-md-2" >
			<img id="childPic" class="img-circle">
		</div>
		<div class="col-xs-3 col-md-3">
			<div id="childdata">
				<h3 id="childName"></h3>
				<div id="data"><h3>Group: </h3><h3 id="childGroup"></h3></div>
				<div id="data"><h3>Date of Birth: </h3><h3 id="childDob"></h3></div>
			</div>
		</div>
		<div class="col-xs-5 col-md-5">
			<div id="myProgress">
				<h3>Attendence</h3>
				<h4>Term 1 </h4><div class="progress"><div id="myBar1" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="margin-top:0px;"></div></div>
				<h4>Term 2 </h4><div class="progress"><div id="myBar2" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"></div></div>
				<h4>Term 3 </h4><div class="progress"><div id="myBar3" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"></div></div>
				<h4>Term 4 </h4><div class="progress"><div id="myBar4" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"></div></div>
			</div>
		</div>
  </div>
	<div class="row">
		<div id="attendence-chart">
						
		</div>
		<div class="col-xs-8 col-md-8">
			<div id="pie-chart" name="pie-chart">
						
					</div>
		</div>
	</div>
</body>

</html>
<script type="text/javascript">
function graph()
{
	
	google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawAttendenceChart);
	google.charts.setOnLoadCallback(drawPieChart);
	fetchData();
	//alert(name);
}
	function drawAttendenceChart() {
		var name = document.getElementById("txt").value;
      var jsonData = $.ajax({
		  url: 'ajax2.php',
		  dataType:"json",
		  type: 'post',
		  data: { "func": "bar","dat":name},
		  async: false
		  }).responseText;
		  
	var obj = JSON.parse(jsonData);
	   //alert(obj[0]);
	   //alert(obj[1]);
	   //alert(obj[2]);alert(obj[3]);
	   var data = google.visualization.arrayToDataTable([
        ["Term", "Attendence"],
        ["Term 1", obj[0]],
        ["Term 2", obj[1]],
        ["Term 3", obj[2]],
        ["Term 4", obj[3]]
      ]);
	   
		document.getElementById("myBar1").innerHTML = obj[0]+'/20';
		document.getElementById("myBar1").style.width = (obj[0]/20)*100+'%';

		document.getElementById("myBar2").innerHTML = obj[1]+'/20';
		document.getElementById("myBar2").style.width = (obj[1]/20)*100+'%';

		document.getElementById("myBar3").innerHTML = obj[2]+'/20';
		document.getElementById("myBar3").style.width = (obj[2]/20)*100+'%';

		document.getElementById("myBar4").innerHTML = obj[3]+'/20';
		document.getElementById("myBar4").style.width = (obj[3]/20)*100+'%';
	document.getElementById("myProgress").style.visibility = 'visible';
      var options = {
        title: "Attendence",
        width: 600,
        height: 450,
		hAxis: { 
			viewWindow: {
				max:20,
				min:0
			}
		},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("attendence-chart"));
      //chart.draw(data, options);
  }
	function drawPieChart() {
		var name = document.getElementById("txt").value;
        var jsonData = $.ajax({
		  url: 'ajax2.php',
		  dataType:"json",
		  type: 'post',
		  data: { "func": "pie","dat":name},
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
    function fetchData() {
		var name = document.getElementById("txt").value;
		//alert(name);
        var jsonData = $.ajax({
		  url: 'ajax2.php',
		  dataType:"json",
		  type: 'post',
		  data: { "func": "childDataFunc","dat":name},
		  async: false
		  }).responseText;
		var obj = JSON.parse(jsonData);
		//alert(obj[0].firstname);
		document.getElementById("childName").innerHTML = " " +obj[0].firstname + " " +obj[0].lastname;
		document.getElementById("childGroup").innerHTML = " " +obj[0].groupname;
		document.getElementById("childDob").innerHTML = " " +obj[0].dob;
		document.getElementById("childPic").src = "images/children/" +obj[0].photo;
		document.getElementById("childdata").style.visibility = 'visible';
      }
  
  </script>

    