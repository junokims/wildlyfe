<?php
session_start();
if (isset($_POST['save'])) {
$eventid = $_POST['Event_ID'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'wyldlyfe')or die("initial host/db connection problem");

$sql ="DELETE from events WHERE Event_ID='$eventid'";

$run = mysqli_query($dbconnect, $sql) or die(mysqli_error($dbconnect).$query);
$_SESSION['message'] = "We have removed this event";
header('location: deletionevent.php');
}

?>