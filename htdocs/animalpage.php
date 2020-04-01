<?php  include('connect-insertion.php'); ?>

<!DOCTYPE html>

<html>
<head>
<title>Table with database</title>
<title>Find all entry tickets purchased from a certain employee</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      margin: 15px 0;
      font-weight: 400;
      }
      h4 {
      margin-bottom: 4px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 3px;
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
      select {
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      margin-bottom: 3px;
      }
      .item {
      position: relative;
      display: flex;
      flex-direction: column;
      margin: 10px 0;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      left: 94%;
      top: 30px;
     z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      left: 93%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      .street, .desired-outcome-item, .complaint-details-item {
      display: flex;
      flex-wrap: wrap;
      }
      .street input {
      margin-bottom: 10px;
      }
      small {
      display: block;
      line-height: 16px;
      opacity: 0.7;
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
      @media (min-width: 568px) {
      input {
      width: calc(35% - 20px);
      margin: 0 0 0 8px;
      }
      select {
      width: calc(50% - 8px);
      margin: 0 0 10px 8px;
      }
      .item {
      flex-direction: row;
      align-items: center;
      }
      .item p {
      width: 30%;
      }
      .item i {
      left: 61%;
      top: 25%;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      left: 60%;
      }
      .street, .desired-outcome-item, .complaint-details-item {
      width: 70%;
      }
      .street input {
      width: calc(50% - 20px);
      }
      .street .street-item {
      width: 100%;
      }
      .address p, .desired-outcome p, .complaint-details p {
      align-self: flex-start;
      margin-top: 6px;
      }
      .desired-outcome-item, .complaint-details-item {
      margin-left: 12px;
      }
      textarea {
      width: calc(100% - 6px);
      }
      }
table, body {
border-collapse: collapse;
width: 90%%;
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

.button-container form, .button-container form div{
display: inline;
}

.button-container button {
display: inline;
vartical-align: middle;
}

tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
 <img src="pet.png" align="center"  width="51" height="51">
<table align="center" width= "1000" >
<h1> View our animals and their enclosure below! </h1>
<p> As you'll notice, we have a knack for naming our animals non-traditional names– it's part of our charm..
</p>
<p> Below, you'll find you can add a new animal to our facilities, or delete one as needed! Unfortunately you'll be unable to edit any details as of now as you require caretake approval to do so. </p>
<br> </br>
<tr>
<th>Animal ID</th>
<th>Enclosure ID</th>
<th>Species</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "root", "wyldlyfe");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM AnimalLivesIn";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Animal_ID"]. "</td><td>" . $row["Enclosure_ID"] . "</td><td>"
. $row["Species"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
<br>
</br>
</table>
<div class="button-container">
	<form action="insertion.php">
          <button type="submit" name="add an animal">Add an animal</button>
	</form>

 	<form action="deletion.php">        
		<button type="submit" name="delete one of our animal">Delete an animal</button>
	</form>
</div>
<br> </br>
<form method="post">
<h1> Fun Educational Content Below! </h1> 
<h2> What do we feed our animals? </h2> 
<p> That's a great question, enter the animal ID in the textbox below and find out! </p>
<input  class="street-item" type="text" name="animal_id" placeholder="Animal ID" />
<button type="submit" name="check">Check</button>
<?php
if (isset($_POST['check'])) {
$animalid = $_POST['animal_id'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'wyldlyfe')or die("initial host/db connection problem");

$sql1 = "SELECT Food_Item_ID FROM Eats e, AnimalLivesIn ali WHERE ali.Animal_ID=e.Animal_ID AND ali.Species='$animalid'";
$result1 = mysqli_query($dbconnect,$sql1);

while($row = mysqli_fetch_array($result)) {
    $name = $row['Food_Item_ID'];
    echo "<tr><td style='width: 200px;'>".$name."</td></tr>";
} 

echo "</table>";
mysqli_close($dbconnect);


}

?>

</body>
</html>