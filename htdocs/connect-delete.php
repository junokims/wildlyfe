<?php
include 'deletion.php';
if (isset($_POST['save'])) {
$animalid = $_POST['animal_id'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'Wildlyfe')or die("initial host/db connection problem");

$res = mysqli_query($dbconnect, "SELECT COUNT(`Animal_ID`) c  FROM AnimalLivesIn WHERE `Animal_ID`='$animalid'");
$row = mysqli_fetch_assoc($res);
$C = $row['c'];
if ($C==1)
{
  $sql ="DELETE from AnimalLivesIn WHERE Animal_ID='$animalid'";
  $run = mysqli_query($dbconnect, $sql) or die(mysqli_error($dbconnect).$query);
    echo "<h1 style=';color:#000000;text-align:center'> $animalid has been deleted!</h1>";
}
else
{
    echo "<h1 style=';color:#000000;text-align:center'> Looks like $animalid isn't in our system! try again</h1>";
}
}
?>
