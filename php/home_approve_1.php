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
    <title>Home View</title>
    <link rel="stylesheet" href="../css/designav.css?v=1.4">
    <link rel="stylesheet" href="../css/designapprove.css?v=1.4">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<style>
    section{
        padding: 5%;
    }
    .image{
    display: grid;
    grid-gap: 10px;
    grid-template-areas: 'first first . .' 'first first . .';
    margin: 20px 0;
}
.image div img{
    width: 100%;
    display: block;
    border-radius: 10px;
    box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.4);
}
.img_1{
    grid-area: first;
}
.small-details ul {
    list-style: none;
    display: flex;
  }
.small-details ul li {
    margin-left: 20px;
  }
  .small-details ul li a {
    text-decoration: none;
    color: #555;
    display: block;
    padding:8px 20px;
    border-radius: 20px
  }
  .small-details ul li:hover{
    background-color: #ccc;
    border-radius: 20px;
}
#book {
    
    width: 20%;
    margin-left: 80%;
    background-color: #f55;
    border-style: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: auto; 
    box-shadow:  0 3px 8px rgba(0, 0, 0, 0.523);
}

#book:hover {
    background-color: rgb(255, 255, 255);
    
}
#book a:hover{
    text-decoration: none;
    color: #f55;
    text-shadow:  0 3px 8px rgba(0, 0, 0, 0.404);
}
#book a {
    font-size: 25px;
    margin-bottom: 10px;
    text-decoration: none;
    color: rgb(255, 255, 255);
}
/* Existing CSS code */

/* Add a media query for small screens */
@media (max-width: 768px) {
    #book {
        width: 100%; /* Make the button full width on small screens */
        margin-left: 0; /* Remove left margin */
        margin-top: 18px; /* Add some top margin for spacing */
    }
    
    .image div img {
        width: 100%; /* Make images full width on small screens */
    }
    
    .image {
        grid-template-areas: 'first' 'first' 'first' 'first'; /* Adjust grid template for images */
        grid-gap: 5px; /* Reduce grid gap for better spacing */
    }
    #popup a{
        font-size: 10px;
    }
    
}
@media (min-width:768px) {
    #popup {
        margin-bottom: 10px;
    }
}


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
#popup {
    display: flex;
    max-width: 22%;
    margin-top:3% ;
    margin-left: 79%;
  background: white;
  border: 1px solid #f55;
  box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.413);
  padding: 10px 5px;
  
  z-index: 10;
  display: none;
  border-radius: 5px;
  background-color: #fff;
  
} 
#popup a{
   
    margin-left: 30px;
    font-weight: bold;
}

#popup a:hover {
  background-color: #e74c3c;
  color: #ffffff;
  box-shadow: 0 3px 4px rgba(0, 0, 0, 0.413);
}
li .style_a  {
    background-color: #fff;
  text-decoration: none;
  padding: 8px 12px;
  border-radius: 4px;
  font-size: 1rem; 
  color: #f55;
  text-shadow: 0 3px 3px rgba(255, 200, 0, 0.395);
  transition: background-color 0.3s ease;
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
    /* margin-left: 97%; */
    position: absolute;
    top:25%;
    left:90%;
  
}
#myButton{
    color: #fff;
    font-size: 20px;
    background-color: #f55;
    border: none;
    padding: 10px 20px;
    box-shadow:  0 3px 6px rgba(0, 0, 0, 0.297);
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
    margin-left: 88%;
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
   </header> <br><br>
   <section>
   <p>
  <?php  echo "<p style='color:#ff0800;font-size:18px;'>$user</p>"; ?>
    </p>
   <?php
    if(isset($_GET["viewid"])) {
                     $_SESSION['vid']=$_GET["viewid"];
                     $vid=$_SESSION['vid'];
                     $query = "SELECT * FROM home,host WHERE home.hostid=host.hostid AND home.homeid='$vid'";

                      $result=mysqli_query($conn,$query);

                      if($result){
                       

                        if (mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)){
     
                        ?> 
                        <!-- For Home Name and Location -->
                        <a href="../index.php"><input type="submit" value="Back" id="back"></a>
                         <div>
                            <h1><?php echo $row['HVname']; ?></h1>
                            <p>Location: <?php echo $row['HAddress'];?></p>
                           
                        <p><?php echo "For Local:". $row['Price'];echo "ks"." for one night "; ?></p>
                    <p><?php echo "For Foreigner:".$row['dollor'];echo "$"." for one night "; ?></p>
                        <div>
                            
                        
                       
                    <input type="button" id="myButton" value="Book Now" name="booking" onclick="handleButtonClick()">
                                <a href="../php/userlogin.php"><div id="error" style="font-size:15px;margin-top:1%;margin-left:87%;color:#f55;text-decoration:none;"></div></a>
 
                                <script>
                                    var isLoggedIn = <?php echo json_encode(isset($_SESSION['uid'])); ?>;
 
                                       function handleButtonClick() {
                                                if (!isLoggedIn) {
                                                    // User is not logged in, disable the button
                                                    document.getElementById("myButton").disabled = true;
                                                    // document.location="php/signup.php";
                                                    document.getElementById("error").innerHTML="You need to signin for Booking!";
                                                } else {
                                                    
                                                   document.location="../php/local.php?home_id=<?php echo htmlentities($row["homeid"]); ?>";
                                                   
 
                                                }
                                            }
                                </script>
    
                                
                                

                        </div><br>
                        <!-- For Home images  -->
                        <div class='image'>
                            <div class='img_1'>
                                <a href="upload/<?php echo $row["Himage"];?>">
                                <img src="upload/<?php echo $row["Himage"];?>" alt="Home Image">
                                </a>
                            </div>
                            <div>
                                <a href="upload/<?php echo $row["Bed_room"];?> ">
                                <img src="upload/<?php echo $row["Bed_room"];?> " alt="Bedroom Image"  >
                                </a>
                            
                            </div>
                            <div>
                                <a href="upload/<?php echo $row["Bath_room"];?>"><img  src="upload/<?php echo $row["Bath_room"];?>" alt="Bathroom Image" ></a>
                            
                            </div>
                            <div>
                                <a href="upload/<?php echo $row["Dinningroom"];?>"><img  src="upload/<?php echo $row["Dinningroom"];?>" alt="Dinning Image" ></a>
                            
                            </div>
                            <div>
                                <a href="upload/<?php echo $row["Living"];?>"><img  src="upload/<?php echo $row["Living"];?>" alt="Living Image" ></a>
                            
                            </div>
                        </div>
                    
                        
                        <br><hr>
                        <!-- For home amenities -->
                        <div id='amenities'>
                            <h2>Amenities</h2><br>
                            <?php echo $row['Amenities'] ?>
                        </div>
                        <br><hr>
                        <!-- For Rooms -->
                        <div id='rooms'>
                            <h2>Rooms</h2><br>
                            <p>Bedrooms: <?php echo $row['Bedroom'] ?></p>
                            <p>Bathrooms: <?php echo $row['Bathroom'] ?></p>
                            <p>Other rooms: <?php echo $row['Rooms'] ?></p>
                        </div>
                        <br><hr>
                        <!-- For home rules -->
                        <div id='policy'>
                                <h2>Home Rules</h2><br>
                                
                                <p>Number of Guests: <?php echo $row['Guests'] ?></p>
                        </div>
                        <br><hr>
                        
                        <!-- For Host -->
                        <div id='host'>
                                <h2>Host</h2><br>
                                <p>Host Name: <?php echo  $row["FirstName"].$row["LastName"] ; ?></p>
                                <p>Host Phno: <?php echo $row['phoneno'] ?></p>
                                <p>Host Email: <?php echo $row['Email'];?></p>
                        </div>
                    <?php } } } }?> 
                        
               
   </section><br><br>
   <footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>
</html>