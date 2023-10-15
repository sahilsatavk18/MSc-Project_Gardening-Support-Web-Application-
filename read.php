<?php
// Check existence of id parameter before processing further
if(isset($_GET["Serial_No"]) && !empty(trim($_GET["Serial_No"]))){
    // Include config file
    require_once "gardendb.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM gardens WHERE Serial_No = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["Serial_No"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $gardenname = $row["Garden_Name"];
                $areaname = $row["Area_Name"];
                $plantname = $row["Plant_Name"];
                $sdate = $row["SDate"];
                $picture = $row["picture"];
                $notes = $row["Notes"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label><h4>Garden Name</h4></label>
                        <div class="tutorial"><p><b><?php echo $row["Garden_Name"]; ?></b></p></div>
                    </div>
                    <div class="form-group">
                        <label><h4>Area Name</h4></label>
                        <div class="tutorial"><p><b><?php echo $row["Area_Name"]; ?></b></p></div>
                    </div>
                    <div class="form-group">
                        <label><h4>Plant Name</h4></label>
                        <div class="tutorial"><p><b><?php echo $row["Plant_Name"]; ?></b></p></div>
                    </div>
                    <div class="form-group">
                        <label><h4>Start Date</h4></label>
                        <div class="tutorial"><p><b><?php echo $row["SDate"]; ?></b></p></div>
                    </div>
                    <div class="form-group">
                        <label><h4>Image</h4></label><br>
                        <div class="tutorial"><p><b><?php echo $row["picture"]; ?></b></p></div>
                    </div>
                    <div class="form-group">
                        <label><h4>Notes</h4></label><br>
                        <div class="tutorial"><p><b><?php echo $row["Notes"]; ?></b></p></div>
                    </div>
                    <p><a href="landing.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>