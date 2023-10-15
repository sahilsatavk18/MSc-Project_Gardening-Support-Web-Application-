

<!DOCTYPE html>
<html lang="en">
  <!-- Design by foolishdeveloper.com -->
<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CSS Progress Bar</title>
 <style>
  body {font-family: Arial, Helvetica, sans-serif;background-color: aliceblue; background-image: url(images/GardenXYZbgimage.jpg); background-repeat: no-repeat; background-size: 100% 170%;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  opacity: 0.5;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.Cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.Cancelbtn, .Signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .Cancelbtn, .Signupbtn {
     width: 100%;
  }
  body{
    background-size: 100% 100%;
  }
} 
@media screen and (max-height: 473px) {
  body{
    background-size: 100% 100%;
  }
} 
.center {
  height:100%;
  display:flex;
  align-items:center;
  justify-content:center;

}
.form-input {
  width:350px;
  padding:20px;
  background:#fff;
  box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
              3px 3px 7px rgba(94, 104, 121, 0.377);
}
.form-input input {
  display:none;

}
.form-input label {
  display:block;
  width:45%;
  height:45px;
  margin-left: 25%;
  line-height:50px;
  text-align:center;
  background:#1172c2;

  color:#fff;
  font-size:15px;
  font-family:"Open Sans",sans-serif;
  text-transform:Uppercase;
  font-weight:600;
  border-radius:5px;
  cursor:pointer;
}

.form-input img {
  width:100%;
  display:none;

  margin-bottom:30px;
}

   
  </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <div class="topnav" id="myTopnav">
    <a href="trial.html">Home</a>
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
      <div id="id01" class="modal">
  
        <form class="modal-content animate" action="/action_page.php" method="post">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="img_avatar2.png" alt="Avatar" class="avatar">
          </div>
      
          <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
      
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
              
            <button type="submit">Login</button>
            <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
          </div>
      
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
          </div>
        </form>
      </div>
<form action="output_trial.php" style="border:1px solid #ccc" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>Plant XYZ</h1><br><br>
    <label for="psw"><b>Plant Name</b></label><br>
    <input type="text" placeholder="Enter plant name" name="psw" required><br>

    <label for="email"><b>Garden Name</b></label><br>
    <input type="text" placeholder="Enter garden name" name="gardenname" required><br>

    <label for="email"><b>Area Name</b></label><br>
    <input type="text" placeholder="Enter area name" name="areaname" required><br>

    <label for="psw-repeat"><b>Start Date</b></label><br>
    <input type="date" placeholder="Enter sowing date " name="psw-repeat" style="opacity: 0.5;"><br><br>
   
    <div class="center">
    Select Image File to Upload:
    <input type="file" name="file">
    <!--<input type="submit" name="submit" value="Upload">-->
      </div><br><br>

      <div class="center">
      <label for="email"><b>Notes</b></label><br>
      <input type="text"  name="notes" placeholder=" Enter notes here..."  style="opacity: 0.5;">
      </div><br>
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

    

    <div class="clearfix">
      <button type="button" class="Cancelbtn">Cancel</button>
      <button type="submit" name="submitbutton" value="Submit" class="Signupbtn">Submit</button>
    </div>
  </div>
</form>
<script src="./scripts.js"></script>
</body>
</html>

