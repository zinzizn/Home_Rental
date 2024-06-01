<?php
session_start();
// if(isset($_SESSION["user_id"])) {
//   header("Location: host_1.php"); // Redirect to dashboard if already logged in
//   exit();
// }
require_once("projectdb.php");

if(isset($_POST["usersigninBtn"])) {
  $name=mysqli_real_escape_string($conn,$_POST["name"]);
  $email=mysqli_real_escape_string($conn,$_POST["email"]);

  $sql="SELECT * FROM usertbl WHERE UEmail='$email'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);

  $_SESSION['uid']=$row['uid'];
  $_SESSION["user"] = $row['UserName'];
  $_SESSION['UEmail']=$row['UEmail'];

  if($_SESSION["user"]){
    header("Location:../index.php");
  }

  
  // if($row && $name==$row['UserName']){
    
  //   header("Location:../index.php");
  // }

  
  else{
    return false;
  }

  }
  
  
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="stylesheet" href="../css/designav.css?v=1.6">
    <link rel="stylesheet" href="../css/sign.css?v=1.3">
  
    <style>
      #back{
        color: #fff;
font-size: 16px;
background-color: #f55;
border: none;
padding: 10px 20px;
box-shadow:  0 3px 4px rgba(0, 0, 0, 0.253);
border-radius: 5px;
text-decoration: none;
transition: background-color 0.3s, color 0.3s;
margin-left: 93%;
      }
    </style>
    
 </head>

<body>
<header>
   <nav>
   <a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
      
    </nav>
   </header> 
   <section>
   <a href="../index.php"><input type="submit" value="Back" id="back"></a>
   <div id="signup">
    <h1>Sign In</h1>
    <p>For security, please sign in to access your information!</p>
    <form action="#" method="post" class="signin-form">
      <label for="name">Name</label>
      <input type="text" name="name" id="nameTxt" placeholder="Name" required>
      <label for="email">Email</label>
     
      <input type="email" name="email" id="Email" placeholder="Email"
              required>
              
              <br>
              
      <div>
        <a href="../php/register1.php" style="text-decoration:none;color:red;font-size:18px;">Don't have an account! Please register.</a>
      </div><br>
      <button type="submit" name="usersigninBtn" id="sign">Sign In</button>
      
      <br>
    </form>
    
</section>
<footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>

</html>