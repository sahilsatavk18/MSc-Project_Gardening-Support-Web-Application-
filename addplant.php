<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Plant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/navbar.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
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
  background-image: linear-gradient(-60deg, rgba(2,0,36,1) 0%, rgba(9,243,164,0.36858070865064774) 59%, rgba(0,212,255,1) 100%);
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
.tutorial {
            display: inline-block;
            width: 500px;
            height: 5px;
            padding: 20px 10px;
            background-color:#FAF9F6;
            opacity: 0.5;
         }
    </style>
</head>
<body>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
    <div class="topnav" id="myTopnav">
        <a href="homepage.html">Home</a>
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
      <form action="plant_trial.php" style="border:1px solid #ccc" method="post">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Plant Details</h2>
                    <p>Please enter the input values and submit to add the plant record.</p>
                    <div class="form-group">
                    <label for="email"><b>Serial Number</b></label><br>
    <input type="number" placeholder="Enter serial number of garden" name="Serial_No" required><br>
                    </div>
                    <div class="form-group">
                    <label for="email"><b>Plant Name</b></label><br>
    <input type="text" placeholder="Enter plant name" name="Plant_Name" required><br>
                    </div>
                    <div class="form-group">
                    <label for="email"><b>Area Name</b></label><br>
    <input type="text" placeholder="Enter area name" name="Area_Name" required><br>
                    </div>
                    <div class="form-group">
                    <label for="psw"><b>Garden Name</b></label><br>
    <input type="text" placeholder="Enter garden name" name="Garden_Name" required><br>
                    </div>
                        <div class="form-group">
                            <label>Equipment/Materials Required</label>
                            <input type="text" name="equipment" class="form-control">
                        
                        </div>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" placeholder="Enter sowing date " name="psw-repeat" class="form-control">
                        </div>
                    
                        <div class="form-group">
                            <label>Notes</label>
                            <input type="text" name="notes" class="form-control">
                        </div>
                        <!--<script type="text/javascript">
        function showPreview(event){
        if(event.target.files.length > 0){
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
          preview.style.display = "block";
        }
      }
      </script>-->
                        <!--<input type="hidden" name="Serial_No" value="<?php //echo $id; ?>"/>-->
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="landing.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>