<?php


if(isset($_POST['phone'])){
	require 'conn.php';
	  /*$customerName=$connection->createCommand("SELECT CustomerName,CustomerAddress from customer WHERE CustomerPhone=".$_POST['phone'])->queryAll();*/
	  $result=mysql_query("SELECT name from client WHERE phone='". mysql_real_escape_string(trim($_POST['phone']))."'");

	  $array = mysql_fetch_row($result);                          //fetch result

  //--------------------------------------------------------------------------
  // 3) echo result as json
  //--------------------------------------------------------------------------
  echo $array[0]."!";

	 /*echo (mysql_num_rows($quary)!=0) ? mysql_result($quary, 0,'CustomerName') : "Name not fond";*/


}
