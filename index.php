<?php
session_start();

require_once('php/projectdb.php');
if(!empty($_SESSION['user'])){
 $user= $_SESSION['user'];
}




if(isset($_POST['searchBtn'])){
  $dest=mysqli_real_escape_string($conn,$_POST['Locationtxt']);
  if($dest=="Kalaw" or $dest=="kalaw"){
    echo "<script>document.location='php/home_approve_kalaw.php'</script>";
  }
  elseif($dest=="Bagan" or $dest=="bagan"){
    echo "<script>document.location='php/home_approve_bagan.php'</script>";
  }
  elseif($dest=="Mandalay" or $dest=="mandalay"){
    echo "<script>document.location='php/home_approve_mandalay.php'</script>";
  }
  elseif($dest=="Nay Pyi Taw" or $dest=="nay pyi taw"){
    echo "<script>document.location='php/home_approve_naypyitaw.php'</script>";
  }
  else{
    echo "<script>document.location='php/home_approve_taunggyi.php'</script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Airbnb - Find Unique Places to Stay</title>
  <link rel="stylesheet" href="css/designav.css?v=1.5">
  <link rel="stylesheet" href="css/home.css?v=1.7">
  <style>
    
    #popup-window {
  background: white;
  border: 1px solid #f55;
  box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.413);
  padding: 10px 20px;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 10;
  display: none;
  border-radius: 5px;
  background-color: #fff;
  margin-top: -10px;
}  

#location{
    margin-left: 30px;
    height: 45px;
    width: 25%;
    font-size: 25px;
   }
   #search{
    height: 45px;
    background-color: #f55;
    font-size: 20px;
    border: none;
  color: #fff;
  border-radius: 0 8px 8px 0;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.37);
  cursor: pointer;
  transition: background-color 0.3s, color 0.3s;
  text-shadow: 0 0px 5px rgba(0, 0, 0, 0.263);
   }
  </style>
</head>
<body>
<header>
  

    <nav>
      <a href="#" class="logo" class="active"><img src="image/MicrosoftTeams-image (2).png" alt="Airbnb"></a>
      <ul>
        <!-- <li><a href="../php/explore1.php">Explore</a></li> -->
        <li><a  class="style_a" href="php/view_appointment.php">View Booking</a></li>
      <li><a class="style_a" href="php/Content.php">Help?</a></li> 
      
      
      <li><a class="style_a" href="#" id="popup-link">Signin</a></li>
      
      
      <li id="popup-window">
      
        <a class="style_a" href="php/admin_signin.php">Admin</a>
        <a class="style_a" href="php/signin.php">Host</a>
      
      </li>
<script>
  // Get the elements by their ID
  var popupLink = document.getElementById("popup-link");
  var popupWindow = document.getElementById("popup-window");
  
  // Show the pop-up window when the link is clicked
  popupLink.addEventListener("click", function(event) {
    event.preventDefault();
    popupWindow.style.display = "block";
  });
  
</script> 
       
      </ul>
    </nav>
</header>
<section class="featured-listings">
  <div class="hero">
    <p>
  <?php  echo "<p style='color:#ff0800;font-size:18px;margin-right:90%;'>$user</p>"; ?>
    </p>
    <h1>Find Unique Places to Stay</h1>
    <form action="#" method="post">
                          <select name="Locationtxt" id="location">
                                <option value="choose">---Choose Location---</option>
                                <option value="Bagan">Bagan</option>
                                <option value="Mandalay">Mandalay</option>
                                <option value="Kalaw">Kalaw</option>
                                <option value="Taung Gyi">Taung Gyi</option>
                                <option value="Nay Pyi Taw">Nay Pyi Taw</option>
                            </select>
                            <button type="submit" name="searchBtn" id="search">Search</button>
    </form>
  </div>
<!-- <div>
  <img src="image/home.png" alt="">
</div> -->

  <h2 class="fl1">Featured Listings</h2>
  
  <div class="listing-card" id="kalaw1">
    <a href="php/home_approve_kalaw.php">
      <img src="image/MicrosoftTeams-image (4).png" alt="Listing 1">
    </a>
    <h3>Kalaw</h3>
    <p>
      Kalaw is a historic hill town in western Shan State with a laid-back vibe,
      a cool climate, and picturesque vistas relax. There are still many of Kalaw's
      old colonial-era structures.It is the best place to relax.Willcomes kalaw.
    </p>
  </div>

  <div class="listing-card" id="bagan1">
    <a href="php/home_approve_bagan.php">
      <img src="image/Asia.jpg" alt="Listing 2">
    </a>
    <h3>Bagan</h3>
    <p>
      The primary feature is  the Bagan , where visitors may  Archaeological a Zone
      view a vast diversity of temples the 9th 13th is the Bagan city, both  large and  little, that were
      constructed between 9th and 13th centuries.
    </p>
  </div>

  <div class="listing-card" id="mandalay1">
    <a href="php/home_approve_mandalay.php">
      <img src="image/m4.png" alt="Listing 3">
    </a>
    <h3>Mandalay</h3>
    <p>
      The former capital of Myanmar,Mandalay is now Burma's second-largest
      city.Upper Myanmar's city,which is centered on the Royal Palace Myanmar,serves
      as both the region's political and religious center .
    </p>
  </div>
</section>

<section class="banner">
  <h2>Notation</h2>
  <p>
    In our website, you can get not only booking services but also you can
    host your home!!
  </p>
  <button id="sign"><a href="php/signin.php">Host your home</a></button>
</section>

< <footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>
</html>
