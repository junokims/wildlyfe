<?php  include('connect.php'); ?>
<!DOCTYPE html>
<?php
ob_start();
var_dump($myVar);
$data = ob_get_clean();
$conn = OpenCon();
if (isset($_POST['save'])) {
  $id = $_POST['event_id'];
$name = $_POST['name_of_event'];
$time = $_POST['time'];
$date = $_POST['event_date'];
$loc = $_POST['location'];
$inv = $_POST['number_of_invitees'];
$type = $_POST['type'];
  $msg = '';
$sql ="INSERT into events VALUES ('$id', '$name', '$time', '$date', '$loc', '$inv', '$type')";
 if(mysqli_query($conn,$sql)){
                   $msg =  "<p style= 'text-align:center'> Event $id has been added! We'll be sure to let our hosts know.</p>";                   
                }else{
                   if(mysqli_errno($conn) == 1062)
             $msg =  "<p style='text-align:center'> Looks like $id is already in our system. Please try again.</p>"; 
                else  
                    $msg =  "<p style='text-align:center'> We've run into an error while submitting your form, please check the details again. </p>";

         }
}
?>
<html>
  <head>
    <title>Add a new animal</title>
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
        <h1>Add an event</h1>
        <p>Fill out the details below</p>
        <hr/>
        <div class="item">
          <p>Event_ID</p>
          <input type="text" name="event_id" placeholder="Event ID" />
        </div>
		<div class="item">
          <p>Event Name</p>
          <input type="text" name="name_of_event" placeholder="Event Name" />
        </div>
        <div class="item">
          <p>Time</p>
             <select name="time" >
              <option value="">Time</option>
              <option value="00:00">00:00</option>
              <option value="01:00">01:00</option>
              <option value="02:00">02:00</option>
              <option value="03:00">03:00</option>
              <option value="04:00">04:00</option>
			  <option value="05:00">05:00</option>
              <option value="06:00">06:00</option>
              <option value="07:00">07:00</option>
              <option value="08:00">08:00</option>
              <option value="09:00">09:00</option>
			  <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
			  <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
              <option value="19:00">19:00</option>
			  <option value="20:00">20:00</option>
              <option value="21:00">21:00</option>
              <option value="22:00">22:00</option>
              <option value="23:00">23:00</option>
            </select>
        </div>
		
		<div class="item">
		<p>Date</p>
			<input type="text" name="event_date" placeholder="YYYY-MM-DD" />
		</div>
		
		<div class="item">
          <p>Location</p>
          <input type="text" name="location" placeholder="Location" />
        </div>
		<div class="item">
          <p>Number of Invitees</p>
          <input type="text" name="number_of_invitees" placeholder="Number of Invitees" />
        </div>
        <div class="item">
          <p>Type</p>
          <select name= "type">
              <option value="Class">Class</option>
              <option value="Community Outreach">Community Outreach</option>
              <option value="Corporate Event">Corporate Event</option>
              <option value="Fundraiser">Fundraiser</option>
              <option value="Party">Party</option>
            </select>
        </div>
        <div class="item desired-outcome">
          <button type="submit" name="save">Send</button>
        </div>
   <?php
    if (isset($msg)) {
        echo "<div>" . $msg . "</div>";
    }
    ?>	
	</form>
    </div>
	<div class = "testbox">
	<form action="eventstable.php" method="post">
	<h1>Back to Events</h1>
        <p>Return to the events page.</p>
		<div class="item desired-outcome">
          <button type="submit" name="save">Back</button>
        </div>
      </form>
	  </div>
  </body>
</html>
