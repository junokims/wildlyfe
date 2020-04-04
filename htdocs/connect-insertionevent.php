<?php
session_start();
if (isset($_POST['save'])) {
$id = $_POST['event_id'];
$name = $_POST['name_of_event'];
$time = $_POST['time'];
$date = $_POST['event_date'];
$loc = $_POST['location'];
$inv = $_POST['number_of_invitees'];
$type = $_POST['type'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'wildlyfe')or die("initial host/db connection problem");

$sql ="INSERT into events VALUES ('$id', '$name', '$time', '$date', '$loc', '$inv', '$type')";

$run = mysqli_query($dbconnect, $sql)or die(mysqli_error($dbconnect));
$_SESSION['message'] = "Event Added";
header('location: insertionevent.php');
}

?>