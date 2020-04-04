<?php  include('connect.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Find diet</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p {
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
    <tr>
    <h1>Project something!</h1>
    </tr>
  </div>

  <div>
    <tr>
      <form method = "post" action="projectv2-connect.php">
          <label for="field">Choose a field to project:</label>
              <select id="field" name="selected_field">
                  <option value="employee_number">Employee_Number</option>
                  <option value="name">Name</option>
                  <option value="dob">DOB</option>
                  <option value="sin">SIN</option>
                  <option value="director_number">Director_Number</option>
                  <option value="department_number">Department_Number</option>

              </select>
              <button type="submit" name="submit_form">Submit</button>      </form>
    </tr>
  </div>
  
  </body>

</html>