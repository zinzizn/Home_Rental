<?php
require_once("projectdb.php");

  if(isset($_POST["submitTxt"])){
    $eid=$_GET["editid"];
   
    $addr=mysqli_real_escape_string($conn,$_POST["HAddr"]);
    $location=$_POST["locateTxt"];
    $homeType=$_POST["tphome"];
    $hvname=mysqli_real_escape_string($conn,$_POST["HVname"]);
    $price=$_POST["priceTxt"];
    $amenities = implode(", ", $_POST["amenities"]);
    $bed=$_POST["Bedroom"];
    $bath=$_POST["bathroom"];
    $rooms = implode(", ", $_POST["other_room"]);
    
    $guests=$_POST["InfantTxt"];

    
   
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
    
    
    $sql="UPDATE home set HAddress='$addr',HVname='$hvname',Price='$price',Amenities='$amenities',Bedroom='$bed',Bathroom='$bath',Rooms='$rooms',Guests='$guests',Himage='$imgName',Bed_room='$bedimgName',	Bath_room='$bathimgName',Dinningroom='$dinimgName',	Living='$livimgName' where homeid='$eid'";
          $result=mysqli_query($conn,$sql);
          
          if ($result) {
            
             echo "<script>document.location='../php/host_view.php'</script>";
            
          
       } 
    
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Host</title>
    <link rel="stylesheet" href="../css/designav.css?v=1.5">
   <link rel="stylesheet" href="../css/host.css?v=1.7">
</head>
<body>
<header>
<nav class="adminnav">
<a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>    
    </nav>
  </header>
  <section id="section3" class="section-container">

    <div class="hosting">
        <form method="post" enctype="multipart/form-data">
            <h2>Update Your Place</h2>
            
        <?php 
        $eid=$_GET["editid"];
        $sql = "SELECT * FROM home WHERE homeid='$eid'";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($res);
        if($row>0){
        while($row = mysqli_fetch_assoc($res)){
        ?>      
        <div class="form-container">
       
        <label for="host_addr">Address</label>
        <input type="text" id="host_addr" name="HAddr"  value="<?php echo $row["HAddress"]; ?>" ><br><br>

        
        <label for="location">Location</label>
        <input type="text" name="locateTxt" id='location' value="<?php echo $row["Location"]; ?>" disabled>
        <br><br>

        <label for="place">Type of home</label>
        <input type="text" name="tphome" id="place" value="<?php echo $row["HomeType"]; ?>" disabled >
        

        <label for="honame">Hotel/Villa Name</label>
        <input type="text" id="honame" name="HVname"  placeholder="Enter your hotel/villa name" value="<?php echo $row["HVname"]; ?>"><br><br>

        <label for="price">Price</label>
        <input type="text" name="priceTxt" id="price"  placeholder="mmk / $"
        value="<?php echo $row["Price"];echo "ks" ?>"
        ><br><br>

        

        <hr>
        </div>
        <h3>Amenities</h3>
        <br>
        <div class="amenities">
        
        <div class="checkbox-group first_ameniti">
        <label><input type="checkbox" name="amenities[]" id="Wifi" value="WiFi" <?php if (in_array('WiFi', explode(', ', $row['Amenities']))) echo 'checked'; ?>><span for="Wifi">Wifi</span>
        </label>
        <label>
        <input type="checkbox" name="amenities[]" id="Car_park" value="Parking" <?php if (in_array('Parking',explode(', ', $row['Amenities']))) echo 'checked'; ?>><span for="Car_park">Parking</span>
        </label>
        <label>
        <input type="checkbox" name="amenities[]" id="Air" value="Air Conditioning" <?php if (in_array('Air Conditioning', explode(', ', $row['Amenities']))) echo 'checked'; ?> ><span for="Air">Air Conditioning</span></div><br>
        </label>
        <div class="checkbox-group second_ameniti">
        <label>
        <input type="checkbox" name="amenities[]" id="Wash" value="Washer & Dryer"<?php if (in_array('Washer & Dryer', explode(', ', $row['Amenities']))) echo 'checked'; ?> >
        <span for="Wash">Washer & Dryer</span>
        </label>
        <label>
        <input type="checkbox" name="amenities[]" id="tv" value="TV" <?php if (in_array('TV', explode(', ', $row['Amenities']))) echo 'checked'; ?>>
        <span for="tv">TV</span>
        </label>z
        <label>
        <input type="checkbox" name="amenities[]" id="Pets" value="Pets Welcome" <?php if (in_array('Pets Welcome', explode(', ', $row['Amenities']))) echo 'checked'; ?>>
        <span for="Pets">Pets Welcome</span>
        </label>
        </div>
        </div>
        <hr>
        <h3>Room & Spaces</h3>
        <br>
        <div class="room">
            
            <label for="bed">Any Bedrooms</label>
            <input type="number" name="Bedroom" id="bed" value="<?php echo $row["Bedroom"]; ?>"><br><br>
            
            <label for="bath" required>Any Bathrooms</label>
            <input type="number" name="bathroom" id="bath" value="<?php echo $row["Bathroom"]; ?>"><br><br>

            <div class="Room_space checkbox-group">
            <label>
            <input type="checkbox" name="other_room[]" id="kitchen" value="Kitchen" <?php if (in_array('Kitchen', explode(', ', $row['Rooms']))) echo 'checked'; ?>>
            <span for="kitchen">Kitchen</span>
            </label>
            <label>
            <input type="checkbox" name="other_room[]" id="Dinning" value="Dinning" <?php if (in_array('Dinning', explode(', ', $row['Rooms']))) echo 'checked'; ?>>
            <span for="Dinning">Dinning</span><br><br>
            </label>
            <label>
            <input type="checkbox" name="other_room[]" id="out_space" value="Outdoor Space" <?php if (in_array('Outdoor Space', explode(', ', $row['Rooms']))) echo 'checked'; ?>>
            <span for="out_space">Outdoor Space</span>
            </label>
            <label>
            <input type="checkbox" name="other_room[]" id="liv_room" value="Living Room" <?php if (in_array('Living Room', explode(', ', $row['Rooms']))) echo 'checked'; ?>>
            <span for="liv_room">Living Room</span>
            </label>
            </div>
        </div>
        <hr>
        <h3>Availability</h3>
        <br>
        <div>
           
            
            <label for="infant">Guests</label>
            <input type="number" name="InfantTxt" id="infant"value="<?php echo $row["Guests"]; ?>">
            
        </div><br><hr>
        <br>
        <p style="font-weight:bolder;">The image you want to upload must be between (1024 x 683) px and (720 x 480) px in size.</p><br>
        <div class='img'>
            <span>Home Image</span>
            <div class="updateimage"><img src="upload/<?php echo $row["Himage"];?>" alt="Home Image" ></div>
            <input type="file" name="image[]"  accept="image/*">
        </div>
        <br>
        <div class='img'>
        <span>Bedroom Image</span>
        <div class="updateimage"><img  src="upload/<?php echo $row["Bed_room"];?> " alt="Bedroom Image" ></div>
        <input type="file" name="bedimage[]"  accept="image/*">
        </div><br>
        <div class='img'>
        <span>Dinning Room Image</span>
        <div class="updateimage"><img  src="upload/<?php echo $row["Dinningroom"];?>" alt="Dinning Image" ></div>
        <input type="file" name="dinimage[]" accept="image/*">
        </div><br>
        <div class='img'>
        <span>Bathroom Image</span>
        <div class="updateimage"><img  src="upload/<?php echo $row["Bath_room"];?>" alt="Bathroom Image" ></div>
        <input type="file" name="bathimage[]" accept="image/*" >
        </div><br>
        <div class='img'>
        <span>Living Room Image</span>
        <div class="updateimage"><img  src="upload/<?php echo $row["Living"];?>" alt="Living Image" ></div>
        <input type="file" name="livimage[]" accept="image/*" value="src='upload/<?php echo $row['Living'];?>'">
        </div><br>
        
        <?php } }?>
        <button id="upload" name="submitTxt" style="font-size: 20px;">Edit</button>
        <br>
        </form>
        
        
    </div>

  </section>
  <br><br>
  <footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>
</html>