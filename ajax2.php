<?php
//provide your hostname, username and dbname

if (isset($_POST['func'])) {
	if($_POST['func'] == 'pie')
	{
		if (isset($_POST['dat']))
		{
			pieFunc($_POST['dat']);
		}
	}
	if($_POST['func'] == 'bar')
	{
		if (isset($_POST['dat']))
		{
			barFunc($_POST['dat']);
		}
	}
}
 function pieFunc($data){
	 $host="localhost"; 
		$username="root";  
		$password="";
		$db_name="kg_db";
        $con=mysqli_connect("$host", "$username", "$password","$db_name");
		$sql = "SELECT kin_evidences.activitytype , COUNT(kin_evidences.activitytype) FROM `kin_evidences` WHERE `activitychildren` like '%".$data."%' OR `activitychildren` = 'All' Group BY activitytype";
		$result = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));


		$table = array();
		$table['cols'] = array(
			/* define your DataTable columns here
			* each column gets its own array
			* syntax of the arrays is:
			* label => column label
			* type => data type of column (string, number, date, datetime, boolean)
			*/
			array('label' => 'Label of column 1', 'type' => 'string'),
			array('label' => 'Label of column 2', 'type' => 'number')
			// etc...
		);

		$rows = array();
		while($r = mysqli_fetch_array($result)) {
			$temp = array();
			// each column needs to have data inserted via the $temp array
			$temp[] = array('v' => $r[0]);
			$temp[] = array('v' =>  (int)$r[1]);
			// etc...
			
			// insert the temp array into $rows
			$rows[] = array('c' => $temp);
		}

		// populate the table with rows of data
		$table['rows'] = $rows;

		// encode the table as JSON
		$jsonTable = json_encode($table);

		// set up header; first two prevent IE from caching queries
		header('Cache-Control: no-cache, must-revalidate');
		header('Content-type: application/json');
		//mysqli_close($con);
		// return the JSON data
		echo $jsonTable;
    }
function barFunc($data){
	 $host="localhost"; 
		$username="root";  
		$password="";
		$db_name="kg_db";
        $con=mysqli_connect("$host", "$username", "$password","$db_name");
		$sql = "SELECT `attend_term1`,`attend_term2`,`attend_term3`,`attend_term4` FROM `kin_children` WHERE `nickname` like '%".$data."%'";
		$result = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));


		

		$rows = array();
		while($r = mysqli_fetch_array($result)) {
			$temp = array();
			// each column needs to have data inserted via the $temp array
			$temp[] = (int)$r[0];
			$temp[] = (int)$r[1];;
			$temp[] = (int)$r[2];;
			$temp[] = (int)$r[3];;
			// insert the temp array into $rows
			$rows =$temp;
		}

		// populate the table with rows of data
		

		// encode the table as JSON
		$jsonTable = json_encode($rows);

		// set up header; first two prevent IE from caching queries
		header('Cache-Control: no-cache, must-revalidate');
		header('Content-type: application/json');
		//mysqli_close($con);
		// return the JSON data
		echo $jsonTable;
    }
    
?>
