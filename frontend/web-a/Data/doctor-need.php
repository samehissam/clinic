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

$data = json_decode(file_get_contents("php://input"));
$id = mysql_real_escape_string($data->doctor_id);
// $lstname = mysql_real_escape_string($data->lstname);
// mysql_connect("localhost", "root", "") or die(mysql_error());
// mysql_select_db("angularjs") or die(mysql_error());
// mysql_query("INSERT INTO friends (fname,lname) VALUES ('$fstname', '$lstname')");
// Print "Your information has been successfully added to the database.";

$result=$conn->query("SELECT * FROM doctor_needs WHERE doctor_doctor_id=".$id);


$outp="";
while ($row=mysqli_fetch_array($result)) {

	if($outp!=""){
		$outp .=",";

	}
	//SELECT item_name related to id
	$doctor_name=$conn->query("SELECT doctor_name from doctor
		where doctor_id = ".$row["doctor_doctor_id"]);
	// while ($item=mysqli_fetch_array($item_name)) {
	//
	// }

	while ($doctor=mysqli_fetch_array($doctor_name)) {
			$outp .='{"doctor_name":"' .$doctor["doctor_name"] .'",';
				}
				//SELECT item_name related to id


							$item_name=$conn->query("SELECT item_name from inventory
								where item_id = ".$row["inventory_item_id"]);
							// while ($item=mysqli_fetch_array($item_name)) {
							//
							// }

							while ($item=mysqli_fetch_array($item_name)) {
									$outp .='"item_name":"' .$item["item_name"] .'",';
										}




	$outp .='"item_qty":"' .$row["item_qty"] .'",';
	$outp .='"item_cost":"' .$row["item_cost"] .'",';



	$outp .='"out_date":"' .$row["out_date"] .'"}';

}
	$outp='['.$outp.']';

echo ($outp);
?>
