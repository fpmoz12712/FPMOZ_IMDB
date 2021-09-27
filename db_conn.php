<?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "imdbdb";


//$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $uname, $password);
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/////////////////////////
// $conn = mysqli_connect($sname, $uname, $password, $db_name);
$conn = new PDO("mysql:host=$sname;dbname=$db_name", $uname, $password);

if (!$conn) {
	echo "Connection Failed!";
	exit();
}