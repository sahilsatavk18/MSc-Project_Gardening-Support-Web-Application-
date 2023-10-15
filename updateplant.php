<?php
// Include config file
require_once "gardendb.php";
// Define variables and initialize with empty values
$gardenname = $areaname = $plantname =$sdate  = $notes= "";
$gardenname_err = $areaname_err = $plantname_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["Serial_No"]) && !empty($_POST["Serial_No"]) && isset($_POST["Plant_Name"]) && !empty($_POST["Plant_Name"])){
    $id = $_POST["Serial_No"];
    $plantname=$_POST["Plant_Name"];
    // Validate name
    //$input_gardenname = trim($_POST["Garden_Name"]);
    /*if(empty($input_gardenname)){
        $gardenname_err = "Please enter a name.";
    } elseif(!filter_var($input_gardenname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $gardenname_err = "Please enter a valid name.";
    }*/ 
        //$gardenname = $input_gardenname;
    
    
    // Validate area name
    //$input_areaname = trim($_POST["Area_Name"]);
    /*if(empty($input_areaname)){
        $areaname_err = "Please enter an area";     
    } */
    
        //$areaname = $input_areaname;
    
    // Validate plant name
  //$input_plantname = trim($_POST["Plant_Name"]);
     /* if(empty($input_plantname)){
        $plantname_err = "Please enter a plant";     
    } 
    elseif(!filter_var($input_plantname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $plantname_err = "Please enter a valid name.";
    }*/
    
       // $plantname = $input_plantname;

    
    $sdate = $_POST['psw-repeat'];
    $equipment = $_POST['equipment'];
        $notes = $_POST['notes'];
    
                    $sql = "UPDATE plant SET SDate=?, equipment=?, Notes=? WHERE Serial_No=? AND Plant_Name=?";
                    if($stmt = mysqli_prepare($link, $sql)){
                        // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssis", $param_sdate,$param_equipment, $param_notes,$param_id,$param_plantname);
            
            // Set parameters
            $param_id = $id;
            $param_plantname=$plantname;
            $param_sdate = $sdate;
            $param_equipment=$equipment;
            $param_notes = $notes;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: landing.php");
                exit();
                    
                    }else{
                        echo "Oops! Something went wrong. Please try again later.";
                        
                    } 
                }
        mysqli_stmt_close($stmt);
    
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["Serial_No"]) && !empty(trim($_GET["Serial_No"])) && isset($_GET["Plant_Name"]) && !empty(trim($_GET["Plant_Name"]))){
        // Get URL parameter
        $id =  trim($_GET["Serial_No"]);
        $plantname= trim($_GET["Plant_Name"]);
        // Prepare a select statement
        $sql = "SELECT * FROM plant WHERE Serial_No = ? AND Plant_Name=?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "is", $param_id,$param_plantname);
            
            // Set parameters
            $param_id = $id;
            $param_plantname = $plantname;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) >= 0){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $gardenname = $row["Garden_Name"];
                $areaname = $row["Area_Name"];
                $plantname = $row["Plant_Name"];
                $sdate = $row["SDate"];
                $equipment = $row["equipment"];
                $notes = $row["Notes"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Plant Details</h2>
                    <p>Please edit the input values and submit to update the plant record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><h4>Serial Number</h4></label>
                        <div class="tutorial"><p><b><?php echo $id; ?></b></p></div>
                    </div>
                    <div class="form-group">
                        <label><h4>Plant Name</h4></label>
                        <div class="tutorial"><p><b><?php echo $plantname; ?></b></p></div>
                    </div>
                    <div class="form-group">
                        <label><h4>Garden Name</h4></label>
                        <div class="tutorial"><p><b><?php echo $gardenname; ?></b></p></div>
                    </div>
                    <div class="form-group">
                        <label><h4>Area Name</h4></label>
                        <div class="tutorial"><p><b><?php echo $areaname; ?></b></p></div>
                    </div>
                
                        <div class="form-group">
                            <label>Equipment/Materials Required</label>
                            <input type="text" name="equipment" class="form-control" value="<?php echo $equipment; ?>">
                        
                        </div>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" placeholder="Enter sowing date " name="psw-repeat" class="form-control" value="<?php echo $sdate; ?>">
                        </div>
                    
                        <div class="form-group">
                            <label>Notes</label>
                            <input type="text" name="notes" class="form-control" value="<?php echo $notes; ?>">
                        </div>
                        <script type="text/javascript">
        function showPreview(event){
        if(event.target.files.length > 0){
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
          preview.style.display = "block";
        }
      }
      </script>
                        <input type="hidden" name="Serial_No" value="<?php echo $id; ?>"/>
                        <input type="hidden" name="Plant_Name" value="<?php echo $plantname; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="landing.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>