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
  $conn1 = new mysqli("localhost", "root", "", "signup");
  if ($conn1->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
        // Taking all 6 values from the form data(input)
        $User_Name =  $_POST['username'];
        $Garden_Name =  $_POST['gardenname'];
        $Area_Name = $_POST['areaname'];
        $Plant_Name =  $_POST['psw'];
        $SDate = $_POST['psw-repeat'];
        $Notes = $_POST['notes'];
         
        // Performing insert query execution
        // here our table name is college
        /*$sql = "INSERT INTO garden (Garden_Name,Area_Name,Plant_Name,SDate,Notes) VALUES ('$Garden_Name',
            '$Area_Name','$Plant_Name','$SDate','$Notes')";*/

$statusMsg = '';
        
// File upload path
$targetDir = "userimages/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$squery="SELECT username FROM users";
$answer=$conn1->query($squery);
$counter=0;
while($Row=$answer->fetch_assoc()){
if($Row["username"]==$User_Name){
    $counter=1;
    break;
}
}
if(!empty($_FILES["file"]["name"]) && $counter==1){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into gardens (Username,Garden_Name,Area_Name,Plant_Name,SDate,picture,Notes) VALUES ('$User_Name','$Garden_Name',
            '$Area_Name','$Plant_Name','$SDate','".$fileName."','$Notes')");
           
            if($insert){
                $sql = "SELECT Serial_No FROM gardens WHERE Garden_Name='$Garden_Name'";
                $result = $conn->query($sql);
                    if($result->num_rows == 1){
                        while($row = $result->fetch_assoc()) {
                 $SerialNo=  $row["Serial_No"];     
                $insert1 = "INSERT into plant (Username,Serial_No,Plant_Name,Garden_Name,Area_Name,SDate,Notes) VALUES ('$User_Name','$SerialNo','$Plant_Name','$Garden_Name',
                '$Area_Name','$SDate','$Notes')";
                $result1 = $conn->query($insert1);
                
                    }
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                }
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Username does not exist. Enter correct username or signup first if not registered.';
}

// Display status message
echo $statusMsg;
        //if ($insert) {
           if($counter==1){
            if ( isset( $_POST["submitbutton"] ) ) { 

          
          
                // (deal with the submitted fields here)
                header( "Location: http://localhost/Gardening%20Support%20Web%20App/landing.php" ); 
                exit; 
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
        //}
          $conn->close();
        ?>
</body>
 
</html>