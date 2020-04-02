<?php  include('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html {
  box-sizing: border-box;
}

body {
background-image: url("wildlife8.png");
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
div {
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

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
 input, select, textarea {
      width: 100%;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input:hover, textarea:hover, select:hover {
      outline: none;
      border: 1px solid #095484;
      }
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container {
  padding: 0 16px;
  background-color: white;
  border-radius: 25px;
  border: 1px solid #AED6F1;
}

.container2 {
  padding: 0 16px;
  background-color: white;
}

.container2::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.btn-block {
      margin-top: 20px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      -webkit-border-radius: 5px; 
      -moz-border-radius: 5px; 
      border-radius: 5px; 
      background-color: #095484;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background-color: #0666a3;
      }
table {
border-collapse: collapse;
width: 80%%;
color: #666;
font-family: Roboto, Arial, sans-serif;
font-size: 20px;
text-align: left;
padding: 1em 0;
max-width: 56em;
margin-bottom: 50 px;
}
th {
background-color: #0070b5;
color: white;
}
.button-container form, .button-container form div{
margin-top:  50px;
display: inline;
}

.button-container button {
display: inline;
vartical-align: middle;
}
</style>
</head>
<body>
<div class = "container">
<table align="center" width= "1000" >
<h1> Current Events </h1>
<p> Check Out Our Events! </p> 
<tr>
<th>Event ID</th>
<th>Name of Event</th>
<th>Time</th>
<th>Date</th>
<th>Location</th>
<th>Number of Invitees</th>
<th>Type</th>
</tr>
</div>
<?php
$conn = mysqli_connect("localhost", "root", "root", "wyldlyfe");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM events";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Event_ID"]. "</td><td>" . $row["Name_of_Event"] . "</td><td>"
. $row["Time"]. "</td><td>" . $row["Event_date"] . "</td><td>" . $row["Location"] . 
"</td><td>" . $row["Number_of_Invitees"] ."</td><td>" . $row["Type"] ."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>

<div class="button-container">
	<form action="insertionevent.php">
          <button type="submit" name="add an event">Add an event</button>
	</form>

 	<form action="deletionevent.php">        
		<button type="submit" name="delete one of our animal">Remove an event</button>
	</form>
</div>



<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
    <div class="testbox">
      <form action="" method="post">
        <h1>Count Distinct Events</h1>
        <hr/>
        <div class="item desired-outcome">
          <button type="submit" name="check">Send</button>
        </div>
      </form>
    </div>
	
	<?php

$conn = OpenCon();
if (isset($_POST['check'])) {

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
	
	
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
    <div class="testbox">
      <form action="" method="post">
        <h1>Find event names with total attendees greater than the average</h1>
        <hr/>
        <div class="item desired-outcome">
          <button type="submit" name="save">Send</button>
        </div>
      </form>
    </div>
	
	<?php

$conn = OpenCon();
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


</body>
</html>
