<?php
session_start();

require_once('projectdb.php');
if(isset($_SESSION["user"])){
    $user=$_SESSION["user"];
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Approve</title>
    <link rel="stylesheet" href="../css/designav.css?1.5">
    <link rel="stylesheet" href="../css/designapprove.css?v=1.7">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
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
      <ul>
        
      <li><a class="style_a" href="../php/Content.php">Help?</a></li>
        
        <li><a class="style_a" href="#" id="popup-link">Signin</a></li>
      <li id="popup-window">
      
      <a class="style_a" href="../php/admin_signin.php">Admin</a>
        <a class="style_a" href="../php/signin.php">Host</a>
      
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
   <section>
   <p>
  <?php  echo "<p style='color:#ff0800;font-size:18px;margin-left:2.5%;'>$user</p>"; ?>
    </p>
        <?php
        echo "<h1>Places In Taung Gyi</h1>";?>
        <a href="../index.php"><input type="submit" value="Back" id="back"></a>
      <?php  $sql="SELECT * FROM home where Location='Taung Gyi'";
        $result=mysqli_query($conn,$sql);
        if($result){
            if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){

?>
<div class="contain">
        <div class="list-container">
            <div class="left-col">
           
                <div class="hotel">
                    <div class="hotel-img">
                    <a href="../php/home_approve_1.php?viewid=<?php echo htmlentities($row["homeid"]); ?>" ><img src="upload/<?php echo $row['Himage']; ?>" alt="Home Image"></a>
                    </div>
                    <div class="hotel-info">
                    <h1><?php echo $row['HVname'] ;?></h1>
                    <p><?php echo $row['HAddress'];?></p>
                    <p><?php echo $row['Amenities'];?></p>
                    <!-- <div class="star-container">

<i class="fas fa-star" style="color:#f55;"></i>

<i class="fas fa-star" style="color:#f55;"></i>

<i class="fas fa-star" style="color:#f55;"></i>

<i class="fas fa-star-half-alt" style="color:#f55;"></i>

<i class="far fa-star" style="color:#f55;"></i>

 </div> -->
 <p><?php echo "For Local:". $row['Price'];echo "ks"." for one night "; ?></p>
                    <p><?php echo "For Foreigner:".$row['dollor'];echo "$"." for one night "; ?></p>
                    </div>
                    
                </div>

 <?php } } } ?>

  



   </section>
   <footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>
</html>