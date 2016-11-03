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
$result=$conn->query("SELECT * FROM inventory_history order by inventory_history_id DESC");


$outp="";
while ($row=mysqli_fetch_array($result)) {

	if($outp!=""){
		$outp .=",";

	}
	//SELECT item_name related to id
	$item_name=$conn->query("SELECT item_name from inventory
		where item_id = ".$row["inventory_item_id"]);
	// while ($item=mysqli_fetch_array($item_name)) {
	//
	// }

	while ($item=mysqli_fetch_array($item_name)) {
			$outp .='{"item_name":"' .$item["item_name"] .'",';
				}
				//SELECT item_name related to id
				$stock_name=$conn->query("SELECT stock_name from stock_type
					where stock_id = ".$row["stock_type_stock_id"]);
				// while ($item=mysqli_fetch_array($item_name)) {
				//
				// }

				while ($stock=mysqli_fetch_array($stock_name)) {
							$outp .='"stock_name":"' .$stock["stock_name"] .'",';
							}


	$outp .='"item_qty":"' .$row["item_qty"] .'",';



	$outp .='"history_date":"' .$row["history_date"] .'"}';

}
	$outp='['.$outp.']';

echo ($outp);
?>
