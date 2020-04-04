<?php
function OpenCon()
{
	$dbhost = "localhost";
	$dbuser ="root";
	$dbpass ="root";
<<<<<<< HEAD
	$db = "wildlyfe";
=======
	$db = "wildlyfe";
>>>>>>> laura
	$conn = new mysqli($dbhost, $dbuser,
	$dbpass,$db) or die("Connect failed: %s\n".
	$conn -> error);
	return $conn;
 }
 function CloseCon($conn)
 {
	$conn -> close();
 }
<<<<<<< HEAD
 ?>
=======
 ?>
>>>>>>> laura
