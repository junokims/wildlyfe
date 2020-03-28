  
<?php
if (isset($_POST['save'])) {
$animalid = $_POST['animal_id'];
$enclosureid = $_POST['enclosure_id'];
$species = $_POST['Species'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'Wyldlyfe')or die("initial host/db connection problem");

$sql ="INSERT into AnimalLivesIn (Animal_ID, Enclosure_ID, Species) VALUES ('$animalid', '$enclosureid', '$species')";

$run = mysqli_query($dbconnect, $sql)or die(mysqli_error($dbconnect));

}

?>