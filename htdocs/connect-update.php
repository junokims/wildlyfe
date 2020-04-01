<?php
session_start();
if (isset($_POST['update2'])) {
$visitorid = $_POST['visitor_id'];
$name= $_POST['name'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'wyldlyfe')or die("initial host/db connection problem");

$sql = "UPDATE VisitorHasContactInformation SET Name = '$name' WHERE Visitor_ID='$visitorid'";

$run = mysqli_query($dbconnect, $sql);

$_SESSION['message'] = "The visitor's information has been updated.";
header('location: update.php');

}

if (isset($_POST['update3'])) {
$visitorid = $_POST['visitor_id'];
$dob= $_POST['birthday'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'Wildlyfe')or die("initial host/db connection problem");

$sql = "UPDATE VisitorHasContactInformation SET DOB = '$dob' WHERE Visitor_ID='$visitorid'";

$run = mysqli_query($dbconnect, $sql);
$_SESSION['message'] = "The visitor's information has been updated.";
header('location: update.php');
}

if (isset($_POST['update4'])) {
$visitorid = $_POST['visitor_id'];
$address = $_POST['address'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'wyldlyfe')or die("initial host/db connection problem");

$sql = "UPDATE VisitorHasContactInformation SET Address = '$address' WHERE Visitor_ID='$visitorid'";

$run = mysqli_query($dbconnect, $sql);
$_SESSION['message'] = "The visitor's information has been updated.";
header('location: update.php');

}

if (isset($_POST['update5'])) {
$visitorid = $_POST['visitor_id'];
$email = $_POST['email'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'Wildlyfe')or die("initial host/db connection problem");

$sql = "UPDATE VisitorHasContactInformation SET Email = '$email' WHERE Visitor_ID='$visitorid'";

$run = mysqli_query($dbconnect, $sql);
$_SESSION['message'] = "The visitor's information has been updated.";
header('location: update.php');

}

if (isset($_POST['update6'])) {
$visitorid = $_POST['visitor_id'];
$phonenumber = $_POST['phonenumber'];


$dbconnect = mysqli_connect('localhost', 'root', 'root', 'Wildlyfe')or die("initial host/db connection problem");

$sql = "UPDATE VisitorHasContactInformation SET Phone_Number = '$phonenumber' WHERE Visitor_ID='$visitorid'";

$run = mysqli_query($dbconnect, $sql);
$_SESSION['message'] = "The visitor's information has been updated.";
header('location: update.php');

}


?>