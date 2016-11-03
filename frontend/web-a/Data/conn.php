<?php

$servername = "localhost";
$username = "root";
$password = "";
$database='clinic';


// Create connection
//$conn = new mysqli($servername, $username, $password,$database);
$db_handle = mysql_connect($servername, $username, $password);
$db_found = mysql_select_db($database, $db_handle);
// $conn->query("SET CHARACTER SET utf8");
