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
$result=$conn->query("SELECT * FROM employe" );


$outp="";
while ($row=mysqli_fetch_array($result)) {

	if($outp!=""){
		$outp .=",";

	}
	//SELECT item_type.name from item_type where item_type.barcode =

	$outp .='{"employe_name":"' .$row["employe_name"] .'",';

	$outp .='"employe_id":"' .$row["employe_id"] .'",';
	$outp .='"employe_phone":"' .$row["employe_phone"] .'",';
	$outp .='"employe_address":"' .$row["employe_address"] .'",';

	$outp .='"employe_hourPrice":"' .$row["employe_hourPrice"] .'"}';

}
	$outp='['.$outp.']';

echo ($outp);
?>
