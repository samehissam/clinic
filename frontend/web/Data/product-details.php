<?php
// header("Access-Control-Allow-Origin: *");
// header("Content-Type:application/json;charset=UTF-8");
if(isset($_POST['barcodeValue'])){
$servername = "localhost";
$username = "root";
$password = "";
$database='shop2';


// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// $db_handle = mysql_connect($servername, $username, $password);
// $db_found = mysql_select_db($database, $db_handle);
$conn->query("SET CHARACTER SET utf8");
$result=$conn->query("SELECT * FROM product where barcode=". mysql_real_escape_string(trim($_POST['barcodeValue'])));


$outp="";
while ($row=mysqli_fetch_array($result)) {

	if($outp!=""){
		$outp .=",";

	}
	//SELECT item_type.name from item_type where item_type.barcode =

	$outp .='{"model":"' .$row["product_model"] .'",';

	$outp .='"sale_cost":"' .$row["sale_cost"] .'"}';

}

if(strlen($outp)>0){
echo ($outp);
}else{
  $outp .='{"model":"0","sale_cost":"0"}';
  echo ($outp);
}
}
?>
