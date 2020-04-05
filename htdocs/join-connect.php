 
<?php
include 'animalpage.php';
if (isset($_POST['check'])) {
    $animalspecies = $_POST['species'];
    $dbconnect = mysqli_connect('localhost', 'root', 'root', 'wildlyfe')or die("initial host/db connection problem");
    $sql = "SELECT food_item_id FROM eats e, animallivesin ali WHERE ali.animal_id=e.animal_id AND ali.species='$animalspecies'";
    $result = mysqli_query($dbconnect,$sql);
    if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th class='border-class'>We feed our $animalspecies</th></tr>";
    while($row = mysqli_fetch_array($result)) {
        $name = $row['food_item_id'];
        echo "<tr><td class='border-class'>".$name."</td></tr>";
    } 
    echo "</table>";
    } else{
        echo "0 results; did you enter a species we have in our society?";
    }
    echo "<br></br>";
    mysqli_close($dbconnect);
}
?>
