<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
        <?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
       
  $conn = new mysqli("localhost", "root", "", "creategardenplan");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  $Serial_No =  $_POST['Serial_No'];
        $Garden_Name =  $_POST['Garden_Name'];
        $Area_Name = $_POST['Area_Name'];
        $Plant_Name =  $_POST['Plant_Name'];
        $SDate = $_POST['psw-repeat'];
        $equipment = $_POST['equipment'];
        $Notes = $_POST['notes'];
         
        
        $sql = "INSERT INTO plant (Serial_No,Garden_Name,Area_Name,Plant_Name,SDate,equipment,Notes) VALUES ('$Serial_No','$Garden_Name',
            '$Area_Name','$Plant_Name','$SDate','$equipment','$Notes')";

        
            $insert = $conn->query($sql);
        if ($insert) {
            if ( isset( $_POST["submit"] ) ) { 

          
          
                // (deal with the submitted fields here)
                header( "Location: http://localhost/Gardening%20Support%20Web%20App/landing.php" ); 
                exit; 
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
          $conn->close();
        ?>
</body>
 
</html>