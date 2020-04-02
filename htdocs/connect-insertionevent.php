<?php
session_start();
if (isset($_POST['save'])) {
$id = $_POST['Event_ID'];
$name = $_POST['Name_of_Event'];
$time = $_POST['Time'];
$date = $_POST['Event_Date'];
$loc = $_POST['Location'];
$inv = $_POST['Number_of_Invitees'];
$type = $_POST['Type'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'wyldlyfe')or die("initial host/db connection problem");

$sql ="INSERT into events VALUES ('$id', '$name', '$time', '$date', '$loc', '$inv', '$type')";

$run = mysqli_query($dbconnect, $sql)or die(mysqli_error($dbconnect));
$_SESSION['message'] = "Event Added";
header('location: insertionevent.php');
}

?>