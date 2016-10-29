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
$id = mysql_real_escape_string($data->employe_id);
$month = mysql_real_escape_string($data->month);
// $lstname = mysql_real_escape_string($data->lstname);
// mysql_connect("localhost", "root", "") or die(mysql_error());
// mysql_select_db("angularjs") or die(mysql_error());
// mysql_query("INSERT INTO friends (fname,lname) VALUES ('$fstname', '$lstname')");
// Print "Your information has been successfully added to the database.";


// select sum(emp_part_salary.part_cost) from emp_part_salary where Date(emp_part_salary.part_date) between
// (SELECT LAST_DAY(NOW() - INTERVAL 1 MONTH) + INTERVAL 1 DAY) and (SELECT LAST_DAY(NOW()))
/*

select sum(emp_part_salary.part_cost) from emp_part_salary where Date(emp_part_salary.part_date) between
(SELECT LAST_DAY(("2016-10-01") - INTERVAL 1 MONTH) + INTERVAL 1 DAY) and (SELECT LAST_DAY("2016-10-01"))
*/

$year=date("Y");
// $month="10";
$checkDate='"'.$year."-".$month."-01".'"';
// echo $checkDate;

//

/*
Date(emp_part_salary.part_date) between
(SELECT LAST_DAY(('.$checkDate.') - INTERVAL 1 MONTH) + INTERVAL 1 DAY)
and (SELECT LAST_DAY('.$checkDate.')
*/
$result=$conn->query('select sum(emp_part_salary.part_cost) as sumPart from emp_part_salary
where  Date(emp_part_salary.part_date)  between
(SELECT LAST_DAY(('.$checkDate.') - INTERVAL 1 MONTH) + INTERVAL 1 DAY)  and (SELECT LAST_DAY('.$checkDate.')) and  employe_employe_id='.$id);


$empName=$conn->query("SELECT employe_name FROM employe where employe_id=".$id);
$outp="";
while ($row=mysqli_fetch_array($result)) {

	if($outp!=""){
		$outp .=",";

	}

	$outp .='{"sum_salary":"' .$row["sumPart"] .'",';
}
		while ($emp=mysqli_fetch_array($empName)) {
	$outp .='"employe_name":"' .$emp["employe_name"] .'"}';

}

	$outp='['.$outp.']';

echo ($outp);
?>
