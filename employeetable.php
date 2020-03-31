
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table, body {
border-collapse: collapse;
width: 80%%;
color: #666;
font-family: Roboto, Arial, sans-serif;
font-size: 20px;
text-align: left;
padding: 1em 0;
margin: 0 auto;
max-width: 56em;
}
th {
background-color: #588c7e;
color: white;
}


tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table align="center">
<h1> View our employees below! </h1>
<p> Unfortunately, you do not have permission to edit or delete employees without HR approval! However, for your own reference, Department #1 is our office, Department #2 is outdoors, Department #3 is our ticketing, events, and entry staff, and Department #5-6 are seasonal employees that assist everyone else! </p> 
<tr>
<th>Employee Number</th>
<th>Name</th>
<th>Date of Birth</th>
<th>Social Insurance Number</th>
<th>Director Number</th>
<th>Department Number</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "root", "Wildlyfe");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Employee";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Employee_Number"]. "</td><td>" . $row["Name"] . "</td><td>"
. $row["DOB"]. "</td><td>" . $row["SIN"] . "</td><td>" . $row["Director_Number"] . 
"</td><td>" . $row["Department_Number"] ."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>
þ
