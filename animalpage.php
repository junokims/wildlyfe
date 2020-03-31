<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<title>Find all entry tickets purchased from a certain employee</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<style>
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
<table align="center" width= "1000" >
<h1> View our animals and their enclosure below! </h1>
<p> As you'll notice, we have a knack for naming our animals non-traditional names– it's part of our charm..
</p>
<p> Below, you'll find you can add a new animal to our facilities, or delete one as needed! Please remember the only species we host are Lizard, Hedgehog, Monkey,Snake, or Wolf. Accordingly, when you add an animal, ensure they fit this criteria. An enclosure is <animal species> Enclosure. Have fun! </p> 
<tr>
<th>Animal ID</th>
<th>Enclosure ID</th>
<th>Species</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "root", "Wildlyfe");
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
	<button type="submit" name="delete one of our animal" >Delete an animal</button>
	</form>
</div>
</body>
</html>

