<?php

include 'Aggregation.php';$conn = OpenCon();
if (isset($_POST['save'])) {

$sql = "SELECT Count(DISTINCT Event_ID) AS TotalEvents
FROM events";$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table><tr><th class='border-
class'>Total Events</th></tr>";
// output data of each row
	while($row = $result->fetch_assoc()) 
	{ echo "<tr><td
 class='border-
 class'>".$row["TotalEvents"]."</td></tr>";
 }
	echo "</table>";
 } else {
	echo "0 results";
 }
 CloseCon($conn);
}
 ?>