<?php

session_start();

require_once("projectdb.php");
if(isset($_SESSION["user"])){
    $user=$_SESSION["user"];
    
}


  if(isset($_POST["submitTxt"])){

    $hostQuery = mysqli_query($conn, "SELECT hostid FROM host WHERE hostid = '$user[hostid]'");
    $hostResult = mysqli_fetch_assoc($hostQuery);
    $hostid = $hostResult['hostid'];


    $addr=$_POST["HAddr"];
    $location=$_POST["LocationTxt"];
    $homeType=$_POST["placeTxt"];
    $hvname=mysqli_real_escape_string($conn,$_POST["HVname"]);
    $price=$_POST["priceTxt"];
    $amenities = implode(", ", $_POST["amenities"]);
    $bed=$_POST["Bedroom"];
    $bath=$_POST["bathroom"];
    $rooms = implode(", ", $_POST["other_room"]);
    $guest=$_POST['guests'];
   
   $exchangeRate = 3000;  // Exchange rate: 1 USD = 3000 MMK (Kyats)
   $dollorPrice = ($price * 5) / $exchangeRate;


      $imgCount = count($_FILES['image']['name']);
      for ($i = 0; $i < $imgCount; $i++) {
        // Upload image and collect path
        $imgName = $_FILES['image']['name'][$i];
        $imgTempName = $_FILES['image']['tmp_name'][$i];
        $targetPath = "./upload/" . $imgName;
        if (move_uploaded_file($imgTempName, $targetPath)) {
            $imagePaths[] = $imgName;
        }
    }
    
      $bedimgCount = count($_FILES['bedimage']['name']);
      for ($i = 0; $i < $bedimgCount; $i++) {
        // Upload image and collect path
        $bedimgName = $_FILES['bedimage']['name'][$i];
        $bedimgTempName = $_FILES['bedimage']['tmp_name'][$i];
        $bedtargetPath = "./upload/" . $bedimgName;
        if (move_uploaded_file($bedimgTempName, $bedtargetPath)) {
            $bedPaths[] = $bedimgName;
        }
    }
    
      $dinimgCount = count($_FILES['dinimage']['name']);
      for ($i = 0; $i < $dinimgCount; $i++) {
        // Upload image and collect path
        $dinimgName = $_FILES['dinimage']['name'][$i];
        $dinimgTempName = $_FILES['dinimage']['tmp_name'][$i];
        $dintargetPath = "./upload/" . $dinimgName;
        if (move_uploaded_file($dinimgTempName, $dintargetPath)) {
          $dinPaths[] = $dinimgName;
        }
    }
    
      $bathimgCount = count($_FILES['bathimage']['name']);
      for ($i = 0; $i < $bathimgCount; $i++) {
        // Upload image and collect path
        $bathimgName = $_FILES['bathimage']['name'][$i];
        $bathimgTempName = $_FILES['bathimage']['tmp_name'][$i];
        $bathtargetPath = "./upload/" . $bathimgName;
        if (move_uploaded_file($bathimgTempName, $bathtargetPath)) {
          $bathPaths[] = $bathimgName;
        }
    }
   
      $livimgCount = count($_FILES['livimage']['name']);
      for ($i = 0; $i < $livimgCount; $i++) {
        // Upload image and collect path
        $livimgName = $_FILES['livimage']['name'][$i];
        $livimgTempName = $_FILES['livimage']['tmp_name'][$i];
        $livtargetPath = "./upload/" . $livimgName;
        if (move_uploaded_file($livimgTempName, $livtargetPath)) {
          $livPaths[] = $livimgName;
        }
    }
    $sql = mysqli_query($conn, "SELECT * FROM home WHERE HVname = '$hvname'");
    if(mysqli_num_rows($sql)>0){
    $error="*Home name is already exist!!!";
        
    }else{
        $sql = "INSERT INTO home (HAddress, Location, HomeType, HVname, Price, Amenities, Bedroom, Bathroom, Rooms, Guests, Himage, Bed_room, Bath_room, Dinningroom, Living, dollor, hostid) VALUES ('$addr', '$location', '$homeType', '$hvname', '$price', '$amenities', '$bed', '$bath', '$rooms', '$guest', '$imgName', '$bedimgName', '$bathimgName', '$dinimgName', '$livimgName', '$dollorPrice', '$hostid')";
        $result = mysqli_query($conn, $sql);
          
          
          if ($result) {
            
             echo "<script>document.location='../php/host_view.php'</script>";
            
          
       } 
    }
  
    
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Host</title>
   <link rel="stylesheet" href="../css/designav.css?v=1.7">
   <link rel="stylesheet" href="../css/host.css?v=1.9">
  
</head>
<body>
<header>
<nav>
<a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
      <ul>       
         <li class="active"><a href="../php/host_1.php">Host</a></li>        
        <li><a class="style_a" href="../php/host_view.php">View</a></li>
        <li><a class="style_a" href="../php/logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <section id="section1" class="section-container">
<form method="post" enctype="multipart/form-data">
    <div class="hosting">
        
            <h2>Host Your Place</h2>
            <div class="form-container">
        <label for="host_name">Name</label>
        <input type="text" id="host_name" name="HNameTxt" value="<?php echo $user['FirstName'].$user['LastName'];?>" disabled><br><br>

        <label for="host_mail">Email</label>
        <input type="email" name="mailTxt" id="host_mail" value="<?php echo $user['Email']; ?>" disabled><br><br>

        <label for="phno">Phone No</label>
      
       <input type="text" name="PhTxt" required id="phone" 

           pattern="09[0-9]{8,9}"

           title="Please enter a valid Myanmar phone number starting with 09 and having 8 or 9 digits." value="<?php echo $user['phoneno']; ?>" disabled><br><br>
          


        <label for="host_addr">Address</label>
        <input type="text" id="host_addr" name="HAddr" required placeholder="Enter your address"><br><br>

        
        <label for="location">Location</label>
        <select name="LocationTxt" id="location" required>
        <option value="0">---Choose---</option>
            <option value="Bagan">Bagan</option>
            <option value="Kalaw">Kalaw</option>
            <option value="Mandalay">Mandalay</option>
            <option value="Nay Pyi Taw">Nay Pyi Taw</option>
            <option value="Taung Gyi">Taung Gyi</option>
            
        </select><br><br>

        <label for="place">Type of home</label>
        <select name="placeTxt" id="place" required>
        <option value="h0">---Choose---</option>
            
            <option value="Villa">Villa</option>
            
            <option value="Home">Home</option>
        </select><br><br>

        <label for="honame">Hotel/Villa Name</label>
        <input type="text" id="honame" name="HVname" required placeholder="Enter your hotel/villa name">
        <span>
        <?php 
        if(isset($error)){
            echo "<span style='font-size:15px;color:red;'>$error</span>";
        }
        ?>
    </span><br><br>

        <label for="price">Price</label>
        <input type="text" name="priceTxt" id="price" required placeholder="mmk / $">
       
        
        <!-- <input type="hidden" name="dollor" value="<?php echo $changeDollor ?>"> -->

        </div>
        <br><br>
        <h3>Amenities</h3>
        <br>
        <div class="amenities"><br>
    <div class="checkbox-group first_ameniti">
        <label>
            <input type="checkbox" name="amenities[]" value="WiFi">
            <span>WiFi</span>
        </label>
        <label>
            <input type="checkbox" name="amenities[]" value="Parking">
            <span>Parking</span>
        </label>
        <label>
            <input type="checkbox" name="amenities[]" value="Air Conditioning">
            <span>Air Conditioning</span>
        </label>
    </div>
    <div class="checkbox-group second_ameniti">
        <label>
            <input type="checkbox" name="amenities[]" value="Washer & Dryer">
            <span>Washer & Dryer</span>
        </label>
        <label>
            <input type="checkbox" name="amenities[]" value="TV">
            <span>TV</span>
        </label>
        <label>
            <input type="checkbox" name="amenities[]" value="Pets Welcome">
            <span>Pets Welcome</span>
        </label>
    </div>
</div>


          <hr><br>

        <h3>Room & Spaces</h3><br>
        <div class="room checkbox-group">
            
            <label for="bed">Any Bedrooms</label>
            <input type="number" name="Bedroom" id="bed" required value="1"><br><br>

            <label for="bath" required>Any Bathrooms</label>
            <input type="number" name="bathroom" id="bath" value="1"><br><br>

            <div class="Room_space checkbox-group">
    <label>
        <input type="checkbox" name="other_room[]" value="Kitchen">
        <span>Kitchen</span>
    </label>
    <label>
        <input type="checkbox" name="other_room[]" value="Dining">
        <span>Dining</span>
    </label>
    <label>
        <input type="checkbox" name="other_room[]" value="Outdoor Space">
        <span>Outdoor Space</span>
    </label>
    <label>
        <input type="checkbox" name="other_room[]" value="Living Room">
        <span>Living Room</span>
    </label>
    </div>
        </div>
        <br>
        <hr>
        <h3>Availability</h3><br>
        <div class="checkbox-group">
    <label for="guest">Guests</label>
    <input type="number" name="guests" id="guest" required value="1">
</div>
<!-- <div class="guest-info">
    <label for="child">Children</label>
    <input type="number" name="ChildTxt" id="child" value="1">
</div>
<div class="guest-info">
    <label for="infant">Infants</label>
    <input type="number" name="InfantTxt" id="infant" value="1">
</div> -->
<br><hr>
        <br>
        <p class="imageupload">The image you want to upload must be between (1024 x 683) px and (720 x 480) px in size.</p><br>
        <div class='img'>
            <span>Home Image</span>
            <input type="file" name="image[]"  accept="image/*">
            
        </div>
        <br>
        <div class='img'>
        <span>Bedroom Image</span>
        <input type="file" name="bedimage[]"  accept="image/*">
        </div><br>
        <div class='img'>
        <span>Dinning Room Image</span>
        <input type="file" name="dinimage[]" accept="image/*" >
        </div><br>
        <div class='img'>
        <span>Bathroom Image</span>
        <input type="file" name="bathimage[]" accept="image/*" >
        </div><br>
        <div class='img'>
        <span>Living Room Image</span>
        <input type="file" name="livimage[]" accept="image/*" >
        </div>
        <div class="checkbox-group">
        <label>
            <input type="checkbox" name="notice" value="pay">
            <span>If you post your home, you must give service fees 10% to our team.</span>
        </label>
        </div>
        <div class="form-button">
            <button id="upload" name="submitTxt">Upload</button>
        </div>

        
        
        
        
    </div>
    </form>
  </section>
  
  <footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>
</html>