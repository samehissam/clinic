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
$result=$conn->query("SELECT * FROM indoor_history order by indoor_history_id DESC");


$outp="";
while ($row=mysqli_fetch_array($result)) {

	if($outp!=""){
		$outp .=",";

	}
	//SELECT item_name related to id
	$patient_name=$conn->query("SELECT patient_name from patient
		where patient_id = ".$row["patient_patient_id"]. " limit 1");
	// while ($item=mysqli_fetch_array($item_name)) {
	//
	// }

	while ($patient=mysqli_fetch_array($patient_name)) {
			$outp .='{"patient_name":"' .$patient["patient_name"] .'",';
				}
				//SELECT item_name related to id
				$inventory_item_id=$conn->query("SELECT inventory_item_id from indoor_stock
					where stock_id = ".$row["indoor_stock_stock_id"]);
				// while ($item=mysqli_fetch_array($item_name)) {
				//
				// }
				while ($item_id=mysqli_fetch_array($inventory_item_id)) {

							$item_name=$conn->query("SELECT item_name from inventory
								where item_id = ".$item_id["inventory_item_id"]);
							// while ($item=mysqli_fetch_array($item_name)) {
							//
							// }

							while ($item=mysqli_fetch_array($item_name)) {
									$outp .='"item_name":"' .$item["item_name"] .'",';
										}
							}



	$outp .='"item_qty":"' .$row["item_qty"] .'",';
	$outp .='"sale_price":"' .$row["sale_price"] .'",';



	$outp .='"history_date":"' .$row["history_date"] .'"}';

}
	$outp='['.$outp.']';

echo ($outp);
?>
