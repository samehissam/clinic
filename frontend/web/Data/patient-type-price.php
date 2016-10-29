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
$result=$conn->query("SELECT * FROM stock_item_price");


$outp="";
while ($row=mysqli_fetch_array($result)) {

	if($outp!=""){
		$outp .=",";

	}
	//SELECT item_type.name
	$item_name=$conn->query("SELECT patient_type_name from patient_type
    where patient_type_id = ".$row["patient_type_patient_type_id"]." limit 1");
	// while ($item=mysqli_fetch_array($item_name)) {
  //
	// }

	while ($item=mysqli_fetch_array($item_name)) {
      $outp .='{"type_name":"' .$item["patient_type_name"] .'",';
        }

	$outp .='"id":"' .$row["id"]  .'",';
	$outp .='"item_price":"' .$row["stock_item_price"]  .'"}';
}
	$outp='['.$outp.']';

echo ($outp);
?>
