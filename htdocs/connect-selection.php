<?php

include 'employeetable.php';$conn = OpenCon();
if (isset($_POST['save'])) {
(int)$Enum = (int)$_POST['Employee_Number'];

$sql = "SELECT Entry_Number
FROM sells WHERE Employee_Number = $Enum ";$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table><tr><th class='border-
class'>Entry_Number</th></tr>"; 
// output data of each row
	while($row = $result->fetch_assoc()) 
	{ echo "<tr><td class='border-
	class'>".$row["Entry_Number"]."</td></tr>";
 }
	echo "</table>";
 } else {
	echo "0 results";
 }
 CloseCon($conn);
}
 ?>