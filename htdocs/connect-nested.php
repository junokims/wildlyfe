<?php

include 'nestedaggregation.php';$conn = OpenCon();
if (isset($_POST['save'])) {

$sql = "SELECT E1.Name_of_Event
FROM events E1 WHERE E1.Number_of_Invitees > (SELECT AVG(E2.Number_of_Invitees) FROM events E2)";$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table><tr><th class='border-
class'>Event Name</th></tr>";
// output data of each row
	while($row = $result->fetch_assoc()) 
	{ echo "<tr><td
 class='border-
 class'>".$row["Name_of_Event"]."</td></tr>";
 }
	echo "</table>";
 } else {
	echo "0 results";
 }
 CloseCon($conn);
}
 ?>