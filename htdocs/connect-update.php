<?php

if (isset($_POST['update2'])) {
$visitorid = $_POST['visitor_id'];
$name= $_POST['name'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'Wildlyfe')or die("initial host/db connection problem");
$res = mysqli_query($dbconnect, "SELECT COUNT(`Visitor_ID`) c  FROM VisitorHasContactInformation WHERE `Visitor_ID`='$visitorid'");
$row = mysqli_fetch_assoc($res);
$C = $row['c'];
if ($C==1) 
{
$sql = "UPDATE VisitorHasContactInformation SET Name = '$name' WHERE Visitor_ID='$visitorid'";
$run = mysqli_query($dbconnect, $sql);
$_SESSION['message'] = "The visitor's information has been updated.";

} else  
{
  echo "<h1 style=';color:#000000;text-align:center'> Looks like $visitorid isn't in our system! try again</h1>";
}

if (isset($_POST['update3'])) {
$visitorid = $_POST['visitor_id'];
$dob= $_POST['birthday'];

$sql = "UPDATE VisitorHasContactInformation SET DOB = '$dob' WHERE Visitor_ID='$visitorid'";

$run = mysqli_query($dbconnect, $sql);
$_SESSION['message'] = "The visitor's information has been updated.";
header('location: update.php');
}

if (isset($_POST['update4'])) {
$visitorid = $_POST['visitor_id'];
$address = $_POST['address'];


$sql = "UPDATE VisitorHasContactInformation SET Address = '$address' WHERE Visitor_ID='$visitorid'";

$run = mysqli_query($dbconnect, $sql);
$_SESSION['message'] = "The visitor's information has been updated.";
header('location: update.php');

}

if (isset($_POST['update5'])) {
$visitorid = $_POST['visitor_id'];
$email = $_POST['email'];


$sql = "UPDATE VisitorHasContactInformation SET Email = '$email' WHERE Visitor_ID='$visitorid'";

$run = mysqli_query($dbconnect, $sql);
$_SESSION['message'] = "The visitor's information has been updated.";
header('location: update.php');

}

if (isset($_POST['update6'])) {
$visitorid = $_POST['visitor_id'];
$phonenumber = $_POST['phonenumber'];


$sql = "UPDATE VisitorHasContactInformation SET Phone_Number = '$phonenumber' WHERE Visitor_ID='$visitorid'";

$run = mysqli_query($dbconnect, $sql);
$_SESSION['message'] = "The visitor's information has been updated.";
header('location: update.php');

}
}

?>




