<<<<<<< HEAD
<!DOCTYPE html>
=======
<?php  include('connect.php'); ?>
<!DOCTYPE html>
<?php
ob_start();
var_dump($myVar);
$data = ob_get_clean();
$conn = OpenCon();
$msg = '';
if (isset($_POST['update2'])) {
$visitorid = $_POST['visitor_id'];
$name= $_POST['name'];

$res = mysqli_query($conn, "SELECT COUNT(`Visitor_ID`) c  FROM VisitorHasContactInformation WHERE `Visitor_ID`='$visitorid'");
$row = mysqli_fetch_assoc($res);
$C = $row['c'];
if ($C==1 && strlen($name) <= 30 && !(preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $name))){
$sql = "UPDATE VisitorHasContactInformation SET Name = '$name' WHERE Visitor_ID='$visitorid'";
$run = mysqli_query($conn, $sql);
                
    $msg= "<p style='text-align:center'> Name for $visitorid  has been updated!</p>";
}  else
{
  $msg="<p style=';color:#545454;text-align:center'> We found an error while submitting your form, please check the details again</p>";
}
}

if (isset($_POST['update3'])) {
$visitorid = $_POST['visitor_id'];
$dob= $_POST['birthday'];

$res = mysqli_query($conn, "SELECT COUNT(`Visitor_ID`) c  FROM VisitorHasContactInformation WHERE `Visitor_ID`='$visitorid'");
$row = mysqli_fetch_assoc($res);
$C = $row['c'];
if ($C==1 && !(preg_match( '~[a-z]~', $dob))) {
$sql = "UPDATE VisitorHasContactInformation SET DOB = '$dob' WHERE Visitor_ID='$visitorid'";
$run = mysqli_query($conn, $sql);
    $msg= "<p style='text-align:center'> Date of birth for $visitorid has been updated!</p>";
} else
{
  $msg= "<p style='text-align:center'> We found an error while submitting your form, please check the details again</p>";
}

}

if (isset($_POST['update4'])) {
$visitorid = $_POST['visitor_id'];
$address = $_POST['address'];


$res = mysqli_query($conn, "SELECT COUNT(`Visitor_ID`) c  FROM VisitorHasContactInformation WHERE `Visitor_ID`='$visitorid'");
$row = mysqli_fetch_assoc($res);
$C = $row['c'];
if ($C==1 && strlen($address) <= 40) {
$sql = "UPDATE VisitorHasContactInformation SET Address = '$address' WHERE Visitor_ID='$visitorid'";
$run = mysqli_query($conn, $sql);
    $msg= "<p style='text-align:center'> The address for $visitorid has been updated!</p>";
} else 
{
  $msg= "<p style='text-align:center'>We found an error while submitting your form, please check the details again</p>";
}

}

if (isset($_POST['update5'])) {
$visitorid = $_POST['visitor_id'];
$email = $_POST['email'];

$res = mysqli_query($conn, "SELECT COUNT(`Visitor_ID`) c  FROM VisitorHasContactInformation WHERE `Visitor_ID`='$visitorid'");
$row = mysqli_fetch_assoc($res);
$C = $row['c'];
if ($C==1 && strlen($email) <= 40) {
$sql = "UPDATE VisitorHasContactInformation SET Email = '$email' WHERE Visitor_ID='$visitorid'";
$run = mysqli_query($conn, $sql);
    $msg="<p style='text-align:center'> $visitorid has been updated!</p>";
} else  
{
  $msg= "<p style='text-align:center'> We found an error while submitting your form, please check the details again</p>";
}

}

if (isset($_POST['update6'])) {
$visitorid = $_POST['visitor_id'];
$phonenumber = $_POST['phonenumber'];

$res = mysqli_query($conn, "SELECT COUNT(`Visitor_ID`) c  FROM VisitorHasContactInformation WHERE `Visitor_ID`='$visitorid'");
$row = mysqli_fetch_assoc($res);
$C = $row['c'];
if ($C==1 && strlen($phonenumber)==12 &&  !(preg_match( '~[a-z]~', $phonenumber))) {
$sql = "UPDATE VisitorHasContactInformation SET Phone_Number = '$phonenumber' WHERE Visitor_ID='$visitorid'";
$run = mysqli_query($conn, $sql);
    $msg="<p style='text-align:center'> $visitorid has been updated!</p>";
} else  
{
  $msg="<p style='text-align:center'> We found an error while submitting your form, please check the details again</h1>";
}

}
?>
>>>>>>> laura
<html>
  <head>
    <title>Simple Complaint Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<<<<<<< HEAD
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p {
      padding: 0;
      margin: 0;
=======
<style>
      html, body {
      min-height: 100%;
      }
      body {
       background-image: url("wildlife8.PNG");
      padding: 100;
      margin: 20000;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
	  div, form, input, select, p {
      padding: 100;
      margin: 20000;
>>>>>>> laura
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
      form {
      width: 75%;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 5px #ccc;
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
<<<<<<< HEAD
      margin-right: 10px
=======
>>>>>>> laura
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
    </style>
  </head>
  <body>
    <?php if (isset($_SESSION['message'])): ?>
       <div class="msg">
               <?php 
                       echo $_SESSION['message']; 
                       unset($_SESSION['message']);
               ?>
       </div>
     <?php endif ?>
    <div class="testbox">
<<<<<<< HEAD
      <form action="connect-update.php" method="post">
=======
      <form method="post">
>>>>>>> laura
        <h1>View or Edit Visitor Details</h1>
        <p>Find below our current registered visitors. If you would like to update any information
          fill the form below our table by entering the ID you would like to update</p>
        <hr/>
        <br>
        </br>
        <div class="input-group">
          <p><strong>Enter the ID of the visitor you want to update</strong></p>
          <input type="number" name="visitor_id" placeholder="0" />
        </div>
        <br>
        </br>
        <div class="input-group">
          <p>Name</p>
          <input type="text" name="name" placeholder="Name"  />
          <button type="save" name='update2'>Update</button>
<<<<<<< HEAD
        </div>
=======
 </div>
>>>>>>> laura
        <div class="input-group">
          <p>Date of Birth</p>
          <input type="text" name="birthday" placeholder="Dob"/>
          <button type="save" name='update3'>Update</button>
        </div>
        <div class="item-group">
          <p>Address</p>
          <input type="text" name="address" placeholder="Address"/>
          <button type="save" name='update4'>Update</button>
        </div>
        <div class="item-group">
          <p>Email</p>
          <input type="text" name="email" placeholder="Email"/>
          <button type="save" name='update5'>Update</button>
        </div>
        <div class="item-group">
          <p>Phone number</p>
          <input type="text" name="phonenumber" placeholder="111-111-1111"/>
          <button type="save" name='update6'>Update</button>
<<<<<<< HEAD
      </form>
    </div>
  </body>
</html>
=======
   <?php
    if (isset($msg)) {
        echo "<div>" . $msg . "</div>";
    }
    ?>>     
 </form>
 </div>
</div>
	<div class = "testbox">
	<form action="visitorPage.php" method="post">
	<h1>Back to Visitors</h1>
        <p>Return to the visitor page..</p>
		<div class="item desired-outcome">
          <button type="submit" name="save">Back</button>
        </div>
      </form>
	  </div>
  </body>
</html>
>>>>>>> laura
