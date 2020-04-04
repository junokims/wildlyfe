<<<<<<< HEAD
<?php  include('connect-insertion.php'); ?>

<!DOCTYPE html>
=======
<?php  include('connect.php'); ?>
<!DOCTYPE html>
<?php
ob_start();
var_dump($myVar);
$data = ob_get_clean();
$conn = OpenCon();
if (isset($_POST['save'])) {
  $animalid = $_POST['animal_id'];
  $enclosureid = $_POST['EnclosureID'];
  $species = $_POST['Species'];
  $msg = '';
$sql ="INSERT into AnimalLivesIn (Animal_ID, Enclosure_ID, Species)  VALUES ('$animalid', '$enclosureid', '$species')";
                if(mysqli_query($conn,$sql)){
                   $msg =  "<p style= 'text-align:center'> $animalid has been added! they'll love it here!</p>";                   
                }else{
                   if(mysqli_errno($conn) == 1062)
             $msg =  "<p style='text-align:center'> Looks like $animalid is already in our system. Please try again.</p>"; 
                else  
                    $msg =  "we've run into an error!:".$query."<br>";

         }
}
 ?>
>>>>>>> laura
<html>
  <head>
    <title>Add a new animal</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
<<<<<<< HEAD
      body, div, form, input, select, p {
=======
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
>>>>>>> laura
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
<<<<<<< HEAD
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
    <div class="testbox">
      <form action="connect-insertion.php" method="post">
=======
        <div class="msg">
                <?php 
                        echo $_SESSION['message']; 
                        unset($_SESSION['message']);
                ?>
        </div>
<?php endif ?>
    <div class="testbox">
      <form  name="form"  method="post">
>>>>>>> laura
        <h1>Add a new animal!</h1>
        <p>add his/her details below</p>
        <hr/>
        <div class="item">
          <p>Animal ID</p>
          <input type="text" name="animal_id" placeholder="Full name" />
        </div>
        <div class="item">
          <p>Enclosure ID</p>
             <select name="EnclosureID" >
              <option value="">Enclosure ID</option>
              <option value="Hedgehog Enclosure">Hedgehog Enclosure</option>
              <option value="Lizard Enclosure">Lizard Enclosure</option>
              <option value="Monkey Enclosure">Monkey Enclosure</option>
              <option value="Snake Enclosure">Snake Enclosure</option>
              <option value="Wolf Enclosure">Wolf Enclosure</option>
            </select>
        </div>
        <div class="item">
          <p>Species</p>
          <select name= "Species">
              <option value="">Species</option>
              <option value="Hedgehog">Hedgehog</option>
              <option value="Lizard">Lizard</option>
              <option value="Monkey">Monkey</option>
              <option value="Snake">Snake</option>
              <option value="Wolf">Wolf</option>
            </select>
<<<<<<< HEAD
        </div>
        <div class="item desired-outcome">
          <button type="submit" name="save">Send</button>
        </div>
      </form>
    </div>
  </body>
</html>
=======
</div>
        <div class="item desired-outcome">
          <button type="submit" name="save">Send</button>
        </div>    
   <?php
    if (isset($msg)) {
        echo "<div>" . $msg . "</div>";
    }
    ?>>
    </div>
</div>
</form>
    </div>
        <div class = "testbox">
        <form action="animalpage.php" method="post">
        <h1>Back to Animals</h1>
        <p>Return to the animal page..</p>
                <div class="item desired-outcome">
          <button type="submit" name="save">Back</button>
        </div>
      </form>
          </div>
 </body>
</html>

>>>>>>> laura
