
<?php  include('connect-insertion.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Welcome to Wildlyfe! Our trusty directory and database</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
    body, div, form, input, select, p {
    padding: 100;
    margin: 20000;
    outline: none;
    font-family: Roboto, Arial, sans-serif;
    font-size: 20px;
    color: #666;
    line-height: 22px;
    }

    body {
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

.container {
  padding: 0 16px;
  background-color: white;
  border-radius: 25px;
  border: 1px solid #AED6F1;
}

.grid {
  /* Grid Fallback */
  display: flex;
  flex-wrap: wrap;

  /* Supports Grid */
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  grid-auto-rows: minmax(150px, auto);
  grid-gap: 1em;
}

.module {
  /* Demo-Specific Styles */
  background: #eaeaea;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 200px;

  /* Flex Fallback */
  margin-left: 5px;
  margin-right: 5px;
  flex: 1 1 200px;
}

/* If Grid is supported, remove the margin we set for the fallback */
@supports (display: grid) {
  .module {
    margin: 0;
  }
}
    </style>
  </head>
  <body>
    <div class = "container">

    <a href="welcome.php">
      <img src="pet.png" align="center"  width="51" height="51">
    </a>

    <br></br>

    <div class="testbox">
      <h1 align="center">Welcome to Wildlyfe! Your trusty directory and database.</h1>
      <br></br>
      <p align="center">View our options below and select according to what you're looking for.</p> 
      <br></br>
      <p align="center">Contact our team at any moment by dialing 1-800-WLD-LYFE.</p>
      <br></br>
        </div>
        <div class="grid">
          <div class="module" onclick="location.href='employeetable.php'" style="cursor:pointer;">View our Staff</div>
          <div class="module" onclick="location.href = 'visitorPage.php'" style="cursor:pointer;">View our Visitors</div>
          <div class="module" onclick="location.href='animalpage.php'" style="cursor:pointer;"> View our Animals</div>
          <div class="module" onclick="location.href='eventstable.php'" style="cursor:pointer;">Look Through our Events</div>
        </div>
        <br></br>
    </div>
  </div>
  </body>
</html>