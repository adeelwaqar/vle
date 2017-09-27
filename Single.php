<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src = "chart.js"></script>
	
    <style>
        .table td, .table th {
            border: none;
        }

        .parallax1{
            /* The image used */
            background-image: url('Images/summer.jpg');

            /* Set a specific height */
            height: 300px;

            color: whitesmoke;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .parallax2{
            /* The image used */
            background-image: url('Images/autumn.jpg');

            /* Set a specific height */
            height: 300px;

            color: whitesmoke;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .parallax3{
            /* The image used */
            background-image: url('Images/winter.jpg');

            /* Set a specific height */
            height: 300px;

            color: whitesmoke;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .parallax4{
            /* The image used */
            background-image: url('Images/spring.jpg');

            /* Set a specific height */
            height: 300px;

            color: whitesmoke;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .parallax5{
            /* The image used */
            background-image: url('Images/overall.jpg');

            /* Set a specific height */
            height: 300px;

            color: whitesmoke;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container-fluid {
            padding: 0px;
        }

        h1 {
            line-height: 300px;
            text-align: center;
        }

        .affix {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }
		#myProgress {
			width: 70%;
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
		
		#data
		{
			display:flex;
			float:left;
		}
		#childdata
		{
			
			visibility:hidden;
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
        <div class="row" style="background-color: #607D8B; color: white; padding: 10px">
            <div class="col-md-3">
                <img id="childPic" class="img-fluid rounded-circle" style="max-height: 100%">
            </div>
            <div class="col-md-4" id="childdata">
                <h2 id="childName"></h2>
                <table class="table">
                    <tr>
                        <td>DOB</td>
                        <td id="childDob"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td id="childGender"></td>
                    </tr>
                    <tr>
                        <td>Group</td>
                        <td id="childGroup"></td>
                    </tr>
                    <tr>
                        <td>Activity</td>
                        <td id="childAC"></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-5">
                <div id="myProgress">
				<h3>Attendence</h3>
				<h4>Term 1 </h4><div class="progress"><div id="myBar1" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="margin-top:0px;"></div></div>
				<h4>Term 2 </h4><div class="progress"><div id="myBar2" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"></div></div>
				<h4>Term 3 </h4><div class="progress"><div id="myBar3" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"></div></div>
				<h4>Term 4 </h4><div class="progress"><div id="myBar4" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"></div></div>
				</div>
            </div>
        </div>
        <nav id="navbar-term" class="navbar navbar-light bg-light" data-toggle="affix">
            <a class="navbar-brand" href="#" id="cName"></a>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="#term1">Term 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#term2">Term 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#term3">Term 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#term4">Term 4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#overall">Overall</a>
                </li>
            </ul>
        </nav>
        <div data-spy="scroll" data-target="#navbar-term" data-offset="0" style="position: relative" class="parallax">
            <h1 id="term1" class="parallax1">Term 1</h1>
            <div class="col-xs-8 col-md-8">
			<div id="term1-pie-chart" name="pie-chart"></div>
			</div>
            <h1 id="term2" class="parallax2">Term 2</h1>
            <div class="col-xs-8 col-md-8">
			<div id="term2-pie-chart" name="pie-chart"></div>
			</div>
            <h1 id="term3" class="parallax3">Term 3</h1>
            <div class="col-xs-8 col-md-8">
			<div id="term3-pie-chart" name="pie-chart"></div>
			</div>
            <h1 id="term4" class="parallax4">Term 4</h1>
            <div class="col-xs-8 col-md-8">
			<div id="term4-pie-chart" name="pie-chart"></div>
			</div>
            <h1 id="overall" class="parallax5">Overall</h1>
            <div class="col-xs-8 col-md-8">
			<div id="pie-chart" name="pie-chart"></div>
			</div>
        </div>
    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script type="text/javascript">
    //active scrollspy
    $('body').scrollspy({ target: '#navbar-term' })

    //adding or removing of elements from the DOM
    $('[data-spy="scroll"]').each(function () {
        var $spy = $(this).scrollspy('refresh')
    })

    //affix nav bar
    $(document).ready(function() {

        var toggleAffix = function(affixElement, scrollElement, wrapper) {

            var height = affixElement.outerHeight(),
                top = wrapper.offset().top;

            if (scrollElement.scrollTop() >= top){
                wrapper.height(height);
                affixElement.addClass("affix");
            }
            else {
                affixElement.removeClass("affix");
                wrapper.height('auto');
            }

        };

        $('[data-toggle="affix"]').each(function() {
            var ele = $(this),
                wrapper = $('<div></div>');

            ele.before(wrapper);
            $(window).on('scroll resize', function() {
                toggleAffix(ele, $(this), wrapper);
            });

            // init
            toggleAffix(ele, $(window), wrapper);
        });

    });
</script>
</body>
</html>
<script type="text/javascript">
function graph()
{
	
	google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawAttendenceChart);
	google.charts.setOnLoadCallback(drawPieChart);
	google.charts.setOnLoadCallback(drawTerm1Chart);
	google.charts.setOnLoadCallback(drawTerm2Chart);
	google.charts.setOnLoadCallback(drawTerm3Chart);
	google.charts.setOnLoadCallback(drawTerm4Chart);
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
		document.getElementById("cName").innerHTML = " " +obj[0].firstname + " " +obj[0].lastname;
		document.getElementById("childGroup").innerHTML = " " +obj[0].groupname;
		document.getElementById("childDob").innerHTML = " " +obj[0].dob;
		document.getElementById("childGender").innerHTML = " " +obj[0].gender;
		document.getElementById("childPic").src = "images/children/" +obj[0].photo;
		document.getElementById("childdata").style.visibility = 'visible';
      }
	function drawTerm1Chart() {
		var name = document.getElementById("txt").value;
        var jsonData = $.ajax({
		  url: 'ajax2.php',
		  dataType:"json",
		  type: 'post',
		  data: { "func": "pieTerm1Func","dat":name},
		  async: false
		  }).responseText;
		// Create our data table out of JSON data loaded from server.
		var data = new google.visualization.DataTable(jsonData);

        // Set options for pie chart.
        var options = {title:'Activities Term 1',
						'width':800,
                     'height':800};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('term1-pie-chart'));
        chart.draw(data, options);
      }
	function drawTerm2Chart() {
		var name = document.getElementById("txt").value;
        var jsonData = $.ajax({
		  url: 'ajax2.php',
		  dataType:"json",
		  type: 'post',
		  data: { "func": "pieTerm2Func","dat":name},
		  async: false
		  }).responseText;
		// Create our data table out of JSON data loaded from server.
		var data = new google.visualization.DataTable(jsonData);

        // Set options for pie chart.
        var options = {title:'Activities Term 2',
						'width':800,
                     'height':800};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('term2-pie-chart'));
        chart.draw(data, options);
      }
	function drawTerm3Chart() {
		var name = document.getElementById("txt").value;
        var jsonData = $.ajax({
		  url: 'ajax2.php',
		  dataType:"json",
		  type: 'post',
		  data: { "func": "pieTerm3Func","dat":name},
		  async: false
		  }).responseText;
		// Create our data table out of JSON data loaded from server.
		var data = new google.visualization.DataTable(jsonData);

        // Set options for pie chart.
        var options = {title:'Activities Term 3',
						'width':800,
                     'height':800};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('term3-pie-chart'));
        chart.draw(data, options);
      }
	function drawTerm4Chart() {
		var name = document.getElementById("txt").value;
        var jsonData = $.ajax({
		  url: 'ajax2.php',
		  dataType:"json",
		  type: 'post',
		  data: { "func": "pieTerm4Func","dat":name},
		  async: false
		  }).responseText;
		// Create our data table out of JSON data loaded from server.
		var data = new google.visualization.DataTable(jsonData);

        // Set options for pie chart.
        var options = {title:'Activities Term 4',
						'width':800,
                     'height':800};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('term4-pie-chart'));
        chart.draw(data, options);
      }
  </script>

    