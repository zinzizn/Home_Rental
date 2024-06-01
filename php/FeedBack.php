<?php
require_once("projectdb.php");
if(isset($_POST['sendBtn'])){
  // $name=mysqli_real_escape_string($conn,$_POST['name']);
  // $email=mysqli_real_escape_string($conn,$_POST['email']);
  $question=mysqli_real_escape_string($conn,$_POST['question']);

  $query="INSERT INTO feedback (Question) values ('$question')";
  $result=mysqli_query($conn,$query);
  if($result){
    echo "<script>document.location='../index.php'</script>";
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback From</title>
  <link rel="stylesheet" href="../css/sign.css?v=1.4">
  <link rel="stylesheet" href="../css/designav.css?v=1.5">
  <script src="https://kit.fontawesome.com/67c66657c7.js"></script>
  <script src="FeedBack.js"> </script>
  <style>
    footer{
      margin-top: 7%;
    }
    #back{
  color: #fff;
    font-size: 20px;
    background-color: #f55;
    border: none;
    padding: 10px 20px;
    box-shadow:  0 3px 6px rgba(0, 0, 0, 0.297);
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
    margin-left: 93%;
   margin-bottom: 15px;
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
          <form method="post" name="form" onclick="validateForm()">
        <h1>Give your FeedBack</h1>
        <!-- <div class="id">
          <input id="name" type="text" placeholder="Your Name" name="name">
          <i class="far fa-user"></i>
        </div>
        <div id="nameError"></div>
        <div class="id">
          <input id="email" type="email" placeholder="Email address" name="email">
          <i class="far fa-envelope"></i>
        </div> -->
        <div>
        <textarea name="question" id="areafb" cols="15" rows="5" placeholder="Enter your opinion here.."></textarea>
       </div>
       <br>
        <button id="sign" type="submit" name="sendBtn">Send</button>
      </form>
   </div>
   </section>
   <footer>
    <p>&copy; 2023 Airbnb. All rights reserved.</p>
  </footer>
</body>
</html>