<?php
include 'connect.php';$conn = OpenCon();
$sql = "SELECT Species
FROM AnimalLivesIn";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table><tr><th class='border-
class'>Species</th></tr>";
// output data of each row
        while($row = $result->fetch_assoc()) 
        { echo "<tr><td class='border-
 class'>".$row["Species"]."</td></tr>";
 }
        echo "</table>";
 } else {
        echo "0 results";
 }
 CloseCon($conn);
 ?>
