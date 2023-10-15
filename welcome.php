<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: logina.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }

        body{
    font-family: "Trirong", serif;
}
html {
  height:100%;
}

body {
  margin:0;
}

.bg {
  animation:slide 3s ease-in-out infinite alternate;
  background-image: linear-gradient(-60deg, #6c3 50%, #09f 50%);
  bottom:0;
  left:-50%;
  opacity:.5;
  position:fixed;
  right:-50%;
  top:0;
  z-index:-1;
}

.bg2 {
  animation-direction:alternate-reverse;
  animation-duration:4s;
}

.bg3 {
  animation-duration:5s;
}


h1 {
  font-family:monospace;
}

@keyframes slide {
  0% {
    transform:translateX(-25%);
  }
  100% {
    transform:translateX(25%);
  }
}
    </style>
</head>
<body>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
    <div class="topnav" id="myTopnav">
        <a href="homepage.html" class="active">Home</a>
        <a href="http://localhost/Gardening%20Support%20Web%20App/register.php">Signup</a>
        <a href="http://localhost/Gardening%20Support%20Web%20App/logina.php">Login</a>
        <a href="http://localhost/Gardening%20Support%20Web%20App/Garden XYZ_Trial.php">Garden Planner</a>
        <a href="http://localhost/Gardening%20Support%20Web%20App/landing.php">My Gardens</a>
        <a href="Videos.html">Videos</a>
        <a href="Plants.html">Plants</a>
        <a href="Pests.html">Pests</a>
        <a href="Beneficial Insects.html">Beneficial Insects</a>
        <a href="Plant Diseases.html">Plant Diseases</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </div>


    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>

    <div class="container">
    <h1>Flexible Design</h1><br>
    <h3>Create a design as unique as you are!</h3><br>
    <h4>Add plants, gardens and different garden areas, and upload pictures and special notes about them such as resources/equipment required, etc.</h4><br>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/acacia.jpg" alt="Los Angeles" style="width:100%; height:500px">
      </div>

      <div class="item">
        <img src="images/africandaisy.jpg" alt="Chicago" style="width:100%; height:500px">
      </div>
    
      <div class="item">
        <img src="images/agapanthus.jpg" alt="New york" style="width:100%; height:500px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="container">
    <h1>Standard Garden Plans</h1><br>
    <h4>Print your own personalized planting chart showing how many of each plant you require and when to sow, plant and harvest them.</h4><br> 
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
  
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="images/acacia.jpg" alt="Los Angeles" style="width:100%; height:500px">
        </div>
  
        <div class="item">
          <img src="images/africandaisy.jpg" alt="Chicago" style="width:100%; height:500px">
        </div>
      
        <div class="item">
          <img src="images/agapanthus.jpg" alt="New york" style="width:100%; height:500px">
        </div>
      </div>
  
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  
  <div class="container">
    <h1>Plants, pests and beneficial insects guides</h1><br>
    <h3>Refer to the most authentic source of information!</h3><br>
    <h4>This Garden Planner has a huge variety of vegetables, herbs, fruit and flowers plus videos and written guides covering everything you need to know to plan and produce your most successful garden yet.</h4><br>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/acacia.jpg" alt="Los Angeles" style="width:100%; height:500px">
      </div>

      <div class="item">
        <img src="images/africandaisy.jpg" alt="Chicago" style="width:100%; height:500px">
      </div>
    
      <div class="item">
        <img src="images/agapanthus.jpg" alt="New york" style="width:100%; height:500px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<script src="./scripts.js"></script>
</body>
</html>