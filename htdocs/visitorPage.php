<?php  include('connect-insertion.php'); ?>

<!DOCTYPE html>

<html>
<head>
<title>Table with database</title>
<title>Find information about our visitors!</title>
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
<body>
<div class = "container">
 <img src="pet.png" align="center"  width="51" height="51">
<table align="center" width= "1000" >
<h1> Here are all of our visitors! </h1>
<p>You can sell this information to make more money! </p>
<br> </br>
<tr>
<th>Visitor ID</th>
<th>Name</th>
<th>DOB</th>
<th>Address</th>
<th>E-mail</th>
<th>Phone Number</th>
</div>

</tr>
<?php
    $conn = mysqli_connect("localhost", "root", "root", "wyldlyfe");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM VisitorHasContactInformation";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Visitor_ID"]. "</td><td>" . $row["Name"] . "</td><td>"
            . $row["DOB"]. "</td><td>" . $row["Address"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["Phone_Number"]. "</td></tr>";
        }
        echo "</table>";
    } else { echo "0 results"; }
    $conn->close();
?>

<br> </br>

</table>
<div class="button-container" align="center">
	<form action="update.php">
          <button type="submit" name="update">Update</button>
	</form>

</div>

<br> </br>
<div class="button-container" align="center">
<form method="post">
    <h1 align="center"> Targeted donation request! </h1> 
    <p align="center"> Who has attended all of our events? </p> 
    <br> </br>
    <button type="submit" name="check">Check</button>
</form>
</div>

<br> </br>

<?php
    if (isset($_POST['check'])) {
        $dbconnect = mysqli_connect('localhost', 'root', 'root', 'wyldlyfe')or die("initial host/db connection problem");
        $sql = "SELECT Name FROM VisitorHasContactInformation V WHERE NOT EXISTS ((SELECT E.Event_ID FROM Events E) EXCEPT (SELECT A.Event_ID FROM Attends A WHERE A.Visitor_ID=V.Visitor_ID))";
        $result = mysqli_query($dbconnect,$sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Names</th></tr>";
            while($row = mysqli_fetch_array($result)) {
                $name = $row['Name'];
                echo "<tr><td style='width: 200px;'>".$name."</td></tr>";
            }               
            echo "</table>";
        } else { echo "0 results"; }
        mysqli_close($dbconnect);

    }
?>

<br> </br>

</body>
</html>