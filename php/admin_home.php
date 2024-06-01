<?php 

session_start();
require_once("projectdb.php");
if(isset($_SESSION["user"])){
    $user=$_SESSION["user"];
    
}


if(isset($_POST['submitTxt'])){
    $email=mysqli_real_escape_string($conn,$_POST['emailTxt']);

    $stmt=$conn->prepare("SELECT * FROM host WHERE Email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();

        if($data['Email'] == $email){
            
            $query = "SELECT * FROM home JOIN host ON home.hostid=host.hostid WHERE host.Email='$email'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

            /* $row = mysqli_num_rows($result); */
        }
    }
    $stmt->close();

    
}

if(isset($_POST['submitBtn'])){
    $locate=$_POST['Locationtxt'];
    $stmt=$conn->prepare("SELECT Location FROM home WHERE Location=?");
    $stmt->bind_param("s", $locate);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();

        if($data['Location'] == $locate){
            $query = "SELECT * FROM home WHERE Location=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $locate);
            $stmt->execute();
            $result = $stmt->get_result();
            /* $row = mysqli_num_rows($result); */
        }
    }
    $stmt->close();

   
}
if(isset($_GET['delid'])){
    $delid=$_GET['delid'];
    $sql="DELETE FROM home WHERE homeid=$delid";
    $result=mysqli_query($conn,$sql);
    // echo "<script>alert('Data deleted....')</script>";
    echo "<script>window.location.href='../php/admin_home.php'</script>";
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Details</title>
    <link rel="stylesheet" href="../css/designav.css"?v=1.7>
    <link rel="stylesheet" href="../css/host.css"?v=2.0>
    <link rel="stylesheet" href="../css/admin.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <style>
   .searchtable{
    display: flex;
   }
   .location{
    margin-left: 30px;
   }
   select{
    font-size: 21px;
    background-color: #fff;
    box-shadow:  0 3px 4px rgba(0, 0, 0, 0.253);
  border-radius: 5px;
   }
   option{
    font-size: 15px;
    background-color: #fff;
   }
   @media screen and (max-width: 768px) {
    .section-container {
        width: 90%;
    }
    select{
    font-size: 15px;
    background-color: #fff;
   }
   option{
    font-size: 10px;
    background-color: #fff;
   }
   #upload{
    max-width: 80px;
    font-size: 15px;
    padding: 10px 10px;
 }
 #hname{
    font-size: 15px;
 }
}
 
   </style>
</head>
<body>
<header>
    <nav>
    <a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
     
    <ul>
        <li><a class="style_a"  href="../php/admin_view.php" >Users Details</a></li>
        <li><a class="style_a"  href="../php/admin_host.php" >Hosts Details</a></li>
        <li class="active"><a   href="../php/admin_home.php" >Home Details</a></li>
        <li><a class="style_a" href="../php/admin_feedback.php" >Feedback</a></li>
        <li><a class="style_a" href="../php/logout.php">Logout</a></li>
      </ul>
    </nav>
    
    </header>
<section>
 <section id="section4" class="section-container">

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
        
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Home <b>Details</b></h2>
                    </div><br>
                    <div class="searchtable">
                        <form class="viewsubmit" method="post">
                            <label for="hname">Host Email</label>
                            <input type="text" name="emailTxt" id="hname" placeholder="Please Enter the host email"><br>
                            <input class="click" id="upload" type="submit" name="submitTxt" value="View">
                        </form>
                    
                        <form class="location" method="post">
                            <label for="location">Location</label>
                            <select name="Locationtxt" id="location">
                                <option value="choose">---Choose Location---</option>
                                <option value="Bagan">Bagan</option>
                                <option value="Mandalay">Mandalay</option>
                                <option value="Kalaw">Kalaw</option>
                                <option value="Taung Gyi">Taung Gyi</option>
                                <option value="Nay Pyi Taw">Nay Pyi Taw</option>
                            </select>
                            <input class="click" id="upload" type="submit" name="submitBtn" value="View">
                        </form>
                    </div>
                    <br>
                </div>
                
                </div> 
                
                <table class="display table table-bordered" id="hidden-table-info">
                    <tbody>
                    <tr>    
                            
                            
                            <th>Address</th>
                            <th>Location</th>
                            <th>Home Type</th>
                            <th>HV Name</th>
                            <th>Price</th>
                            <th>Amenities</th>
                            <th>Bedrooms</th>
                            <th>Bathrooms</th>
                            <th>Other Rooms</th>
                            
                            <th>Guests</th>
                            <th>Home Image</th>
                            <th>Bedroom Image</th>
                            <th>Bathroom Image</th>
                            <th>Dinning room Image</th>
                            <th>Living room Image</th>
                            
                            
                            <th></th>
                            </tr>
                            <?php
                            if (isset($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?> 
                      
                      <tr>
                          
                          <td><?php echo $row["HAddress"];?></td>
                          <td><?php echo $row["Location"]; ?></td>
                          <td><?php echo $row["HomeType"]; ?></td>
                          <td><?php echo $row["HVname"]; ?></td>
                          <td><?php echo $row["Price"]; ?></td>
                          <td><?php echo $row["Amenities"]; ?></td>
                          <td><?php echo $row["Bedroom"]; ?></td>
                          <td><?php echo $row["Bathroom"]; ?></td>
                          <td><?php echo $row["Rooms"]; ?></td>
                          
                          <td><?php echo $row["Guests"]; ?></td>
                          <td><img src="upload/<?php echo $row["Himage"];?>" alt="Home Image" style='width:100px; height:100px;'></td>
                          <td><img src="upload/<?php echo $row["Bed_room"];?> " alt="Bedroom Image"  style='width:100px; height:100px;'></td>
                          <td><img  src="upload/<?php echo $row["Bath_room"];?>" alt="Bathroom Image" style='width:100px; height:100px;'></td>
                          <td><img  src="upload/<?php echo $row["Dinningroom"];?>" alt="Dinning Image" style='width:100px;height:100px;'></td>
                          <td><img  src="upload/<?php echo $row["Living"];?>" alt="Living Image" style='width:100px; height:100px;'></td>
                                    
                          
                          <td><a href="../php/admin_home.php?delid=<?php echo htmlentities($row["homeid"]); ?>" onclick="return confirm('Do you really want to delete')"><input class="delete" type="submit" name="deleteBtn" value="Delete" ></a></td>
                              
                      </tr>
                     
                      
                     <?php } }  ?> 
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
   </section>
   </section>
   <footer>
  <p>&copy; 2023 Airbnb. All rights reserved.</p>
  </footer>
</body>
</html>
