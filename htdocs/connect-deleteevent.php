<?php
session_start();
if (isset($_POST['save'])) {
$eventid = $_POST['event_id'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'wildlyfe')or die("initial host/db connection problem");

$sql ="DELETE from events WHERE event_id='$eventid'";

$run = mysqli_query($dbconnect, $sql) or die(mysqli_error($dbconnect).$query);
$_SESSION['message'] = "We have removed this event";
header('location: deletionevent.php');
}

?>