<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
        table tr td:last-child{
            width: 120px;
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
  background-image: linear-gradient(-60deg, rgba(2,0,36,1) 0%, rgba(243,180,9,0.09126978428089982) 27%, rgba(152,255,0,1) 100%);
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
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
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
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Garden Details</h2>
                        <a href="Garden XYZ_trial.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Garden</a>
                        <a href="addplant.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Plant</a>
                        <a href="addarea.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Area</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "gardendb.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM gardens";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped" border="0" cellspacing="2" cellpadding="2" style="margin-left: auto;
                            margin-right: auto;">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Serial Number</th>";
                                        echo "<th>Garden Name</th>";
                                        echo "<th>Area Name</th>";
                                        echo "<th>Plant Name</th>";
                                        echo "<th>Start Date</th>";
                                        echo "<th>Image</th>";
                                        echo "<th>Notes</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                  $imageURL = 'userimages/'.$row["picture"];
                                  echo "<tr>";
                                      echo "<td>" . $row['Serial_No'] . "</td>";
                                      echo "<td>" . $row['Garden_Name'] . "</td>";
                                      $sql1 = "SELECT * FROM plant WHERE Serial_No= '{$row["Serial_No"]}'";
                                      $result1 = mysqli_query($link, $sql1);
                                      echo "<td>";
                                      while($row1 = mysqli_fetch_array($result1)){
                                      echo "<a href='viewarea.php?Serial_No=". $row1['Serial_No'] ."&Area_Name=" . $row1['Area_Name']."'>".$row1["Area_Name"]."</a><br>";
                                      }
                                      echo "</td>";
                                      $sql2 = "SELECT * FROM plant WHERE Serial_No= '{$row["Serial_No"]}'";
                                      $result2 = mysqli_query($link, $sql2);
                                      echo "<td>";
                                      while($row2 = mysqli_fetch_array($result2)){
                                      echo "<a href='updateplant.php?Serial_No=". $row2['Serial_No'] ."&Plant_Name=" . $row2['Plant_Name']."'>".$row2["Plant_Name"]."</a><br>";
                                      }
                                      echo "</td>";
                                      echo "<td>" . $row['SDate'] . "</td>";
                                      echo "<td><a href='$imageURL'>".$row["picture"]."</a> </td>";
                                      echo "<td>" . $row['Notes'] . "</td>";
                                      echo "<td>";
                                          echo '<a href="read.php?Serial_No='. $row['Serial_No'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                          echo '<a href="update.php?Serial_No='. $row['Serial_No'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                          echo '<a href="delete.php?Serial_No='. $row['Serial_No'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                      echo "</td>";
                                  echo "</tr>";
                              }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>