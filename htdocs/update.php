<?php  include('connect.php'); ?>
<!DOCTYPE html>
<?php
ob_start();
var_dump($myVar);
$data = ob_get_clean();
$conn = OpenCon();
$msg = '';
$msg2 ='';
$errormsg = "<p style=';color:#545454;text-align:center'>We found an error while submitting your form, please make sure you're entering the right values</p>";
if (isset($_POST['update'])) {
$visitorid = $_POST['visitor_id'];
$fieldtoupdate= $_POST['field_to_update'];
$newvalue = $_POST['newval'];
$res = mysqli_query($conn, "SELECT COUNT(`visitor_id`) c  FROM visitorhascontactinformation WHERE `visitor_id`='$visitorid'");
$row = mysqli_fetch_assoc($res);
$C = $row['c'];

if ($C==0){ $msg = "<p style='text-align:center'> Unfortunately $visitorid isn't in our records!</p>"; }
else if ($fieldtoupdate=="name" && ( strlen($newvalue) > 30 ||  (preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $newvalue)))){
$msg= $errormsg;}
else if ($fieldtoupdate=="dob" && (preg_match( '~[a-z]~', $newvalue))){
$msg= $errormsg; }
else if ($fieldtoupdate=="address" && strlen($newvalue) >40) {
$msg= $errormsg;
}
else if ($fieldtoupdate=="email" && strlen($newvalue) > 40){
$msg= $errormsg;
}
else if ($fieldtoupdate=="phone_number" && (strlen($newvalue)!=12 || (preg_match( '~[a-z]~', $newvalue)))){
$msg= $errormsg;
} else {
$sql = "UPDATE visitorhascontactinformation SET $fieldtoupdate = '$newvalue' WHERE visitor_id='$visitorid'";
$run = mysqli_query($conn, $sql);
    $msg= "<p style='text-align:center'>The $fieldtoupdate for $visitorid has been updated!</p>";


}
}
if (isset($_POST['update7'])) {
  $visitorid2 = $_POST['visitor_id2'];
  $eventid = $_POST['event'];
  $sql = "INSERT into attends(visitor_id, event_id) VALUES ('$visitorid2', '$eventid')";
  $run = mysqli_query($conn, $sql);
  $msg2="<p style='text-align:center'> Event with ID #$eventid has been updated with $visitorid2 now attending!</p>";

}
?>

<html>
  <head>
    <title>Simple Complaint Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
      <form method="post">
        <h1>View or Edit Visitor Details</h1>
        <p>If you would like to update any information
          fill the form below our table by entering the ID you would like to update</p>
        <hr/>
        <div class="input-group">
    <tr>
      <form method = "post" action="visitorPage.php">
          <p><strong>Enter the ID of the visitor you want to update</strong></p>
          <input type="number" name="visitor_id" placeholder="0" />
        </div> 
  <p>Select the field you would like to update</p>
              <select id="field" name="field_to_update">
                  <option value="visitordetails"> </option>
                  <option value="name">Name</option>
                  <option value="dob">DOB</option>
                  <option value="address">Address</option>
                  <option value="email">Email Address</option>
                  <option value="phone_number"> Phone Number </option>

              </select>
        <div class="input-group">
          <p>Enter new value</p>
          <input type="text" name="newval" placeholder="value"  />
          <button type="save" name='update'>Update</button>
        </div>
    </tr>
   <?php
    if (isset($msg)) {
        echo "<div>" . $msg . "</div>";
    }
    ?>     
 </form>
 </div>
</div>
<div class="testbox">
      <form method="post">
        <h1>Add Visitor to an Event</h1>
        <p>Select the Visitor ID of the attendee, and the Event ID you would like to add to</p>
        <hr/>
        <div class="input-group">
          <p><strong>Enter the ID of the visitor you want to update</strong></p>
          <input type="number" name="visitor_id2" placeholder="0" />
        </div>
        <div class="input-group">
          <p>Event ID</p>
          <input type="text" name="event" placeholder="Event ID"  />
          <button type="save" name='update7'>Update</button>
        </div>

   <?php
    if (isset($msg)) {
        echo "<div>" . $msg2 . "</div>";
    }
    ?>     
 </form>
 </div>

	<div class = "testbox">
	<form action="visitorPage.php" method="post">
	<h1>Back to Visitors</h1>
        <p>Return to the visitor page.</p>
		<div class="item desired-outcome">
          <button type="submit" name="save">Back</button>
        </div>
      </form>
	  </div>
  </body>
</html>

