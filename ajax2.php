<?php
//provide your hostname, username and dbname

if (isset($_POST['func'])) {
	if($_POST['func'] == 'pie')
	{
		if (isset($_POST['dat']))
		{
			pieYearFunc($_POST['dat']);
		}
	}
	if($_POST['func'] == 'bar')
	{
		if (isset($_POST['dat']))
		{
			barFunc($_POST['dat']);
		}
	}
	if($_POST['func'] == 'childDataFunc')
	{
		if (isset($_POST['dat']))
		{
			childDataFunc($_POST['dat']);
		}
	}
	if($_POST['func'] == 'pieTerm1Func')
	{
		if (isset($_POST['dat']))
		{
			pieTerm1Func($_POST['dat']);
		}
	}if($_POST['func'] == 'pieTerm2Func')
	{
		if (isset($_POST['dat']))
		{
			pieTerm2Func($_POST['dat']);
		}
	}if($_POST['func'] == 'pieTerm3Func')
	{
		if (isset($_POST['dat']))
		{
			pieTerm3Func($_POST['dat']);
		}
	}
	if($_POST['func'] == 'pieTerm4Func')
	{
		if (isset($_POST['dat']))
		{
			pieTerm4Func($_POST['dat']);
		}
	}
}
  function pieYearFunc($data){
	 $host="localhost"; 
		$username="root";  
		$password="";
		$db_name="kg_db";
        $con=mysqli_connect("$host", "$username", "$password","$db_name");
		$sql = "SELECT kin_evidences.activitytype , COUNT(kin_evidences.activitytype) FROM `kin_evidences` WHERE `activitychildren` like '%".$data."%' OR `activitychildren` = 'All' Group BY activitytype";
		//$sql = "SELECT kin_evidences.activitytype , COUNT(kin_evidences.activitytype) FROM `kin_evidences` WHERE `activitychildren` like '%".$data."%' Group BY activitytype";
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
  function childDataFunc($data){
	 $host="localhost"; 
		$username="root";  
		$password="";
		$db_name="kg_db";
        $con=mysqli_connect("$host", "$username", "$password","$db_name");
		$sql = "SELECT * FROM `kin_children` WHERE `nickname` like '%".$data."%'";
		$result = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));


		

		$rows = array();
		while($r = mysqli_fetch_array($result)) {
			$temp = array();
			// each column needs to have data inserted via the $temp array
			$temp[] = $r;

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

	function pieTerm1Func($data){
	 $host="localhost"; 
		$username="root";  
		$password="";
		$db_name="kg_db";
        $con=mysqli_connect("$host", "$username", "$password","$db_name");
		$sql = "SELECT kin_evidences.activitytype , COUNT(kin_evidences.activitytype) FROM `kin_evidences` Where (`activitychildren` like '%".$data."%' OR `activitychildren` = 'All') AND (kin_evidences.activitydate > (SELECT kin_term_dates.datefrom FROM kin_term_dates Where kin_term_dates.term = 1) AND kin_evidences.activitydate < (SELECT kin_term_dates.dateto FROM kin_term_dates Where kin_term_dates.term = 1)) Group BY activitytype";
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

	function pieTerm2Func($data){
	 $host="localhost"; 
		$username="root";  
		$password="";
		$db_name="kg_db";
        $con=mysqli_connect("$host", "$username", "$password","$db_name");
		$sql = "SELECT kin_evidences.activitytype , COUNT(kin_evidences.activitytype) FROM `kin_evidences` Where (`activitychildren` like '%".$data."%' OR `activitychildren` = 'All') AND (kin_evidences.activitydate > (SELECT kin_term_dates.datefrom FROM kin_term_dates Where kin_term_dates.term = 2) AND kin_evidences.activitydate < (SELECT kin_term_dates.dateto FROM kin_term_dates Where kin_term_dates.term = 2)) Group BY activitytype";
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
	
	function pieTerm3Func($data){
	 $host="localhost"; 
		$username="root";  
		$password="";
		$db_name="kg_db";
        $con=mysqli_connect("$host", "$username", "$password","$db_name");
		$sql = "SELECT kin_evidences.activitytype , COUNT(kin_evidences.activitytype) FROM `kin_evidences` Where (`activitychildren` like '%".$data."%' OR `activitychildren` = 'All') AND (kin_evidences.activitydate > (SELECT kin_term_dates.datefrom FROM kin_term_dates Where kin_term_dates.term = 3) AND kin_evidences.activitydate < (SELECT kin_term_dates.dateto FROM kin_term_dates Where kin_term_dates.term = 3)) Group BY activitytype";
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
	
	function pieTerm4Func($data){
	 $host="localhost"; 
		$username="root";  
		$password="";
		$db_name="kg_db";
        $con=mysqli_connect("$host", "$username", "$password","$db_name");
		$sql = "SELECT kin_evidences.activitytype , COUNT(kin_evidences.activitytype) FROM `kin_evidences` Where (`activitychildren` like '%".$data."%' OR `activitychildren` = 'All') AND (kin_evidences.activitydate > (SELECT kin_term_dates.datefrom FROM kin_term_dates Where kin_term_dates.term = 4) AND kin_evidences.activitydate < (SELECT kin_term_dates.dateto FROM kin_term_dates Where kin_term_dates.term = 4)) Group BY activitytype";
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

?>
