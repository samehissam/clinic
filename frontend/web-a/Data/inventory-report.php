<?php
// header("Access-Control-Allow-Origin: *");
// header("Content-Type:application/json;charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "";
$database='clinic';


// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// $db_handle = mysql_connect($servername, $username, $password);
// $db_found = mysql_select_db($database, $db_handle);
$conn->query("SET CHARACTER SET utf8");
$result=$conn->query("SELECT * FROM inventory order by item_qty ASC");


$outp="";
while ($row=mysqli_fetch_array($result)) {

	if($outp!=""){
		$outp .=",";

	}
	//SELECT item_type.name from item_type where item_type.barcode =

	$outp .='{"item_name":"' .$row["item_name"] .'",';

	$outp .='"item_id":"' .$row["item_id"] .'",';
	$outp .='"item_qty":"' .$row["item_qty"] .'",';

	$outp .='"item_buyPrice":"' .$row["item_buyPrice"] .'"}';

}
	$outp='['.$outp.']';

echo ($outp);
?>
