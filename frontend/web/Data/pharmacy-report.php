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
$result=$conn->query("SELECT * FROM pharmacy_needs order by id DESC");


$outp="";
while ($row=mysqli_fetch_array($result)) {

	if($outp!=""){
		$outp .=",";

	}
	//SELECT item_name related to id
	$pharmacy_name=$conn->query("SELECT pharmacy_name from pharmacy
		where pharmacy_id = ".$row["pharmacy_pharmacy_id"]);
	// while ($item=mysqli_fetch_array($item_name)) {
	//
	// }

	while ($pharmacy=mysqli_fetch_array($pharmacy_name)) {
			$outp .='{"pharmacy_name":"' .$pharmacy["pharmacy_name"] .'",';
				}




	$outp .='"item_qty":"' .$row["item_qty"] .'",';
	$outp .='"item_name":"' .$row["item_name"] .'",';
	$outp .='"buy_cost":"' .$row["buy_cost"] .'",';



	$outp .='"in_date":"' .$row["in_date"] .'"}';

}
	$outp='['.$outp.']';

echo ($outp);
?>
