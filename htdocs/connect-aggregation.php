<?php

include 'Aggregation.php';$conn = OpenCon();
if (isset($_POST['save'])) {

$sql = "SELECT Max(Number_of_Invitees) AS Max_Attendees
FROM events";$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table><tr><th class='border-
class'>Max Attendees</th></tr>";
// output data of each row
	while($row = $result->fetch_assoc()) 
	{ echo "<tr><td
 class='border-
 class'>".$row["Max_Attendees"]."</td></tr>";
 }
	echo "</table>";
 } else {
	echo "0 results";
 }
 CloseCon($conn);
}
 ?>