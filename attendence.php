<?php
//provide your hostname, username and dbname
$host="localhost"; 
$username="root";  
$password="";
$db_name="kg_db"; 
//$con=mysql_connect("$host", "$username", "$password")or die("cannot connect");


$con=mysqli_connect("$host", "$username", "$password","$db_name");
//$book_name = $_POST['book_name'];
$sql = "SELECT `attend_term1`,`attend_term2`,`attend_term3`,`attend_term4` FROM `kin_children` WHERE `nickname` like '%TARA%'";
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

// return the JSON data
echo $jsonTable;
?>
