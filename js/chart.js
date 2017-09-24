
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

    