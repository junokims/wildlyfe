 
<?php
include 'animalpage.php';
if (isset($_POST['check'])) {
    $animalid = $_POST['animal_id'];
    $dbconnect = mysqli_connect('localhost', 'root', 'root', 'wildlyfe')or die("initial host/db connection problem");
    $sql = "SELECT Food_Item_ID FROM Eats e, AnimalLivesIn ali WHERE ali.Animal_ID=e.Animal_ID AND ali.Species='$animalid'";
    $result = mysqli_query($dbconnect,$sql);
    if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>We feed our $animalid </th></tr>";
    while($row = mysqli_fetch_array($result)) {
        $name = $row['Food_Item_ID'];
        echo "<tr><td style='width: 200px;'>".$name."</td></tr>";
    } 
    echo "</table>";
    } else{
        echo "0 results; did you enter a species we have in our society?";
    }
    echo "<br></br>";
    echo '<a href="animalpage.php">Enter another species!</a>';
    mysqli_close($dbconnect);
}

?>