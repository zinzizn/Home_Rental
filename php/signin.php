<?php
session_start();
// if(isset($_SESSION["user_id"])) {
//   header("Location: host_1.php"); // Redirect to dashboard if already logged in
//   exit();
// }
require_once("projectdb.php");

if(isset($_POST["signin"])) {
  $email=mysqli_real_escape_string($conn,$_POST["email"]);
  $pass=mysqli_real_escape_string($conn,$_POST["pass"]);

  $sql="SELECT * FROM host WHERE Email='$email'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
  
  if($row && $pass==$row['password']){
    $_SESSION["user"] = $row;
    header("Location: host_1.php");
  }

  
  else{
    $error="*Something is wrong!!!";
  }

  }
  
  
?> 



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../css/designav.css?v=1.6">
    <link rel="stylesheet" href="../css/sign.css?v=1.3">
    <script>
        function myFunction() {
            var x = document.getElementById("psw");

            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <style>
  
  </style>
    
 </head>

<body>
<header>
   <nav>
   <a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
      <!--<ul>
      <li><a href="../php/contact_us.php">Contact us</a></li>
        <li><a href="../php/FeedBack.php">FeedBack</a></li>
        <li><a href="../php/signin.php">Sign In</a></li>
      </ul>-->
    </nav>
   </header> 
   <section>
   <div id="signup">
    <h1>Sign In</h1>
    <p>For security, please sign in to access your information</p>
    <form action="#" method="post" class="signin-form">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Email" required>
      <label for="password">Password</label>
      <div class="password-container">
      <input type="password" name="pass" id="psw" placeholder="Password"
             pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
             title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
             required>
             <span>
        <?php 
        if(isset($error)){
            echo "<span style='font-size:15px;color:red;'>$error</span>";
        }
        ?>
    </span>
             <br>
               <input onclick="myFunction()" type="checkbox" id="showPassword " value="Show Password">
        <span for="showPassword" id="showPassword">Show Password</span>
      </div>
      <button type="submit" name="signin" id="sign">Sign In</button>
      <br>
    </form>
    <div class="create" >
      <a href="../php/signup.php" class="create-account">Create an account</a>
    </div>
    <p id="terms-policy">
      By signing up, you agree to our <a href="../php/terms_of_use.php">Terms of Use</a>.
      You can find more information in our <a href="../php/privacy_policy.php">Privacy Policy</a>.
    </p>
  </div>
</section>
<footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>

</html>