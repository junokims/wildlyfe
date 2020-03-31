<?php
session_start();
if (isset($_POST['save'])) {
$animalid = $_POST['animal_id'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'Wildlyfe')or die("initial host/db connection problem");

$sql ="DELETE from AnimalLivesIn WHERE Animal_ID='$animalid'";

$run = mysqli_query($dbconnect, $sql) or die(mysqli_error($dbconnect).$query);
$_SESSION['message'] = "The animal has been erased from our system, good riddance!";
header('location: deletion.php');
}

?>
