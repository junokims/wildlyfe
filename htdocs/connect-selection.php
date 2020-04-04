<?php
<<<<<<< HEAD

=======
ob_start();
var_dump($myVar);
$data = ob_get_clean();
>>>>>>> laura
include 'employeetable.php';$conn = OpenCon();
if (isset($_POST['save'])) {
(int)$Enum = (int)$_POST['Employee_Number'];

$sql = "SELECT Entry_Number
<<<<<<< HEAD
FROM sells WHERE Employee_Number = $Enum ";$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table><tr><th class='border-
class'>Entry Number</th></tr>"; 
=======
FROM Sells WHERE Employee_Number ='$Enum' ";$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table><tr><th class='border-
class'>Entry_Number</th></tr>"; 
>>>>>>> laura
// output data of each row
	while($row = $result->fetch_assoc()) 
	{ echo "<tr><td class='border-
	class'>".$row["Entry_Number"]."</td></tr>";
<<<<<<< HEAD
=======
echo '<a href="employeetable.php"><enter another species>';
>>>>>>> laura
 }
	echo "</table>";
 } else {
	echo "0 results";
 }
<<<<<<< HEAD
 CloseCon($conn);
}
 ?>
=======
echo "enter another ID!";
 CloseCon($conn);
}
 ?>
>>>>>>> laura
