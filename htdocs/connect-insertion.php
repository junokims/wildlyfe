<?php
session_start();
if (isset($_POST['save'])) {
$animalid = $_POST['animal_id'];
$enclosureid = $_POST['enclosure_id'];
$species = $_POST['species'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'wildlyfe')or die("initial host/db connection problem");

$sql ="INSERT into animallivesin (animal_id, enclosure_id, species) VALUES ('$animalid', '$enclosureid', '$species')";

$run = mysqli_query($dbconnect, $sql)or die(mysqli_error($dbconnect));
$_SESSION['message'] = "The new animal has been saved! They will definitely love it here.";
header('location: insertion.php');
}

?>