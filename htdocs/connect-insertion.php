<?php
ob_start();
var_dump($myVar);
$data = ob_get_clean();
include 'insertion.php';
$conn = OpenCon();
if (isset($_POST['save'])) {
  $animalid = $_POST['animal_id'];
  $enclosureid = $_POST['EnclosureID'];
  $species = $_POST['Species'];

$sql ="INSERT into AnimalLivesIn (Animal_ID, Enclosure_ID, Species)  VALUES ('$animalid', '$enclosureid', '$species')";
                if(mysqli_query($conn,$sql)){
                    echo "<h1 style=';color:#000000;text-align:center'> $animalid has been added! they'll love it here!</h1>";
echo '<a href="insertion.php"><enter another species>';                   
                }else{
                   if(mysqli_errno($conn) == 1062)
             echo "<h1 style=';color:#000000;text-align:center'> looks like $animalid is already in our system!!</h1>"; 
                else  
                    echo "we've run into an error!:".$query."<br>";

         }
exit(); //else end
}
 ?>
