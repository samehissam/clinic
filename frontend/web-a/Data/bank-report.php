<?php
// header("Access-Control-Allow-Origin: *");
// header("Content-Type:application/json;charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "449954";
$database='clinic';


// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// $db_handle = mysql_connect($servername, $username, $password);
// $db_found = mysql_select_db($database, $db_handle);
$conn->query("SET CHARACTER SET utf8");
$result=$conn->query("SELECT * FROM bank_movement order by movement_id DESC");


$outp="";
while ($row=mysqli_fetch_array($result)) {

	if($outp!=""){
		$outp .=",";

	}
	$transaction_state=$conn->query("SELECT type_name from transaction_type
		where transaction_id = ".$row["transaction_state"]);
	// while ($item=mysqli_fetch_array($item_name)) {
	//
	// }

	while ($type=mysqli_fetch_array($transaction_state)) {
			$outp .='{"type_name":"' .$type["type_name"] .'",';
				}








	$outp .='"movement_id":"' .$row["movement_id"] .'",';
	$outp .='"money":"' .$row["money"] .'",';
	$outp .='"comment":"' .$row["comment"] .'",';
	$outp .='"transaction_date":"' .$row["transaction_date"] .'"}';





}
	$outp='['.$outp.']';

echo ($outp);
?>
