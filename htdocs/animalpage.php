
<!DOCTYPE html>

<html>
<head>
<title>Table with database</title>
<title>Find all entry tickets purchased from a certain employee</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<style>
html {
  box-sizing: border-box;
}

body{
background-image: url("wildlife8.PNG");
border-collapse: collapse;
width: 80%;
color: #666;
font-family: Roboto, Arial, sans-serif;
font-size: 20px;
text-align: left;
padding: 1em 0;
margin: 0 auto;
max-width: 56em;
}
input{
border-collapse: collapse;
width: 80%;
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
width: 80%;
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
      width: 25%;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(50%% - 10px);
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
.button-container form, .button-container form div{
display: inline;
}
l
.button-container button {
display: inline;
vartical-align: middle;
}
</style>
</head>
  <div class = "container">
    <a href="welcome.php">
      <img src="pet.png" align="center"  width="51" height="51">
    </a>
    <table align="center" >
    <h1> View our animals and their enclosure below! </h1>
    <p> As you'll notice, we have a knack for naming our animals non-traditional names, it's part of our charm..</p>
    <p> Below, you'll find you can add a new animal to our facilities, or delete one as needed! Unfortunately you'll be unable to edit any details as of now as you require caretaker approval to do so. </p>
    <br> </br>
    <tr>
    <th>Animal ID</th>
    <th>Enclosure ID</th>
    <th>Species</th>
    </tr>
  </div>
<?php
$conn = mysqli_connect("localhost", "root", "root", "wildlyfe");
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

<br></br>
</table>


<div class="button-container">
	<form action="insertion.php">
          <button type="submit" name="add an animal">Add an animal</button>
	</form>

 	<form action="deletion.php">
	<button type="submit" name="delete one of our animal" >Delete an animal</button>
	</form>
</div>
<br> </br>


  <div class="testbox">
<form action="join-connect.php"  method="post">
  <h1> Fun Educational Content Below! </h1>
  <h2> What do we feed our animals? </h2>
  <p> That's a great question, select the Species name  in the textbox below and find out! </p>
  
  <select name= "Species">
    <option value="">Species</option>
    <option value="Hedgehog">Hedgehog</option>
    <option value="Lizard">Lizard</option>
    <option value="Monkey">Monkey</option>
    <option value="Snake">Snake</option>
    <option value="Wolf">Wolf</option>
  </select>
  <div class="item desired-outcome">
    <button type="submit" name="check">Send</button>
      <br></br>       
  </div>
</form>
  
 </div>
</body>
</html>


