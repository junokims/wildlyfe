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
background-image: url("wildlife8.PNG");
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
<a href="welcome.php">
  <img src="pet.png" align="center"  width="51" height="51">
</a>
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
$conn = mysqli_connect("localhost", "root", "root", "wildlyfe");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM events";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["event_id"]. "</td><td>" . $row["name_of_event"] . "</td><td>"
. $row["time"]. "</td><td>" . $row["event_date"] . "</td><td>" . $row["location"] . 
"</td><td>" . $row["number_of_invitees"] ."</td><td>" . $row["type"] ."</td></tr>";
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

$sql = "SELECT Count(DISTINCT event_id) AS TotalEvents
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
        <h1>Find the Average Number of Events Per Category</h1>
        <hr/>
        <div class="item desired-outcome">
          <button type="submit" name="save">Send</button>
        </div>
      </form>
    </div>
	
	<?php

$conn = OpenCon();
if (isset($_POST['save'])) {


$sql = "SELECT AVG(av_events.events_per_cat) FROM (SELECT COUNT(*) AS events_per_cat FROM events GROUP BY type) AS av_events";$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table><tr><th class='border-
class'>Average</th></tr>";
// output data of each row
	while($row = $result->fetch_assoc()) 
	{ echo "<tr><td
 class='border-
 class'>".$row["AVG(av_events.events_per_cat)"]."</td></tr>";
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
