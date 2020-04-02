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
table {
border-collapse: collapse
background-color: white;
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
margin: 0 auto;
max-width: 56em;
}
th {
background-color: #0070b5;
color: white;
}
</style>
</head>
<body>
<div class = "container">
<table align = "center">
<h1> Employee Information </h1>
<p> Unfortunately, you do not have permission to edit or delete employees without HR approval! However, for your own reference, Department #1 is our office, Department #2 is outdoors, Department #3 is our ticketing, events, and entry staff, and Department #5-6 are seasonal employees that assist everyone else! </p> 
<tr>
<th>Employee Number</th>
<th>Name</th>
<th>Date of Birth</th>
<th>Social Insurance Number</th>
<th>Director Number</th>
<th>Department Number</th>
</tr>
</div>
<?php
$conn = mysqli_connect("localhost", "root", "root", "wyldlyfe");
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

<h1>See The Team</h1>
<p>Featuring Wildlyfe's Finest!</p>
<br>

<div class="row">
  <div class="column">
    <div class="card">
      <img src="emp1.jpg" alt="Jane" style="width:100%">
      <div class="container2">
        <h2>Laura Ruiz</h2>
        <p class="title">CEO & Founder</p>
        <p>What a boss!</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="emp2.jpg" alt="Mike" style="width:100%">
      <div class="container2">
        <h2>Lauren Ruiz</h2>
        <p class="title">Animal Caretaker</p>
        <p>The only thing they love more than Wildlyfe are the animals themselves.</p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="emp3.png" alt="John" style="width:100%">
      <div class="container2">
        <h2>Lara Ruiz</h2>
        <p class="title">Ticket Clerk</p>
        <p>Customer service extraordinaire!</p>
      </div>
    </div>
  </div>
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
      <form action="connect-selection.php" method="post">
        <h1>See Entries Sold by Employee</h1>
        <hr/>
        <div class="item">
          <p>Employee Number</p>
          <input type="text" name="Employee_Number" placeholder="9999" />
        </div>
        <div class="item desired-outcome">
          <button type="submit" name="save">Send</button>
        </div>
      </form>
    </div>




</body>
</html>
