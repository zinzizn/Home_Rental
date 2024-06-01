<?php 
session_start();

require_once("projectdb.php");
if(isset($_SESSION["user"])){
    $user=$_SESSION["user"];
    
}
require_once("projectdb.php");


if(isset($_POST['submitTxt'])){
    $mail=mysqli_real_escape_string($conn,$_POST['emailTxt']);

    $stmt=$conn->prepare("SELECT hostid,Email FROM host WHERE Email=?");
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();

        if($data['Email'] == $mail){
            // The previous $query variable is now used directly without bind_param

            $query = "SELECT * FROM home JOIN host ON home.hostid=host.hostid WHERE host.Email='$mail'";
            
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = mysqli_num_rows($result);
        }
    }
    
}
/*PHP code for deletion */

if(isset($_GET['delid'])){
    $delid=$_GET['delid'];

    echo $delid;

    $sql="DELETE FROM hosttbl WHERE id=$delid";
    $result=mysqli_query($conn,$sql);
    echo "<script>alert('Data deleted....')</script>";
    echo "<script>window.location.href='host_view.php'</script>";
}/* else{
    echo "<script>alert('Something went wrong....')</script>";
} */

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Details</title>
    <link rel="stylesheet" href="../css/designav.css"?v=1.6>
    <link rel="stylesheet" href="../css/host.css"?v=1.9>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    
        
    </style>
</head>
<body>
<header>
<nav class="adminnav">
<a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
    <ul>
        <li><a class="style_a" href="../php/host_1.php">Host</a></li>
        <li><a class="style_a" href="../php/host_home_user.php" >Home user</a></li>
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
        <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Home <b>Details</b></h2>
                    </div><br>
                    <div>
                        <form class="viewsubmit" method="post">
                            <label for="mail">Email</label>
                            <input type="email" name="emailTxt" id="mail" placeholder="Please Enter Your Email" value="<?php echo $user['Email']; ?>">
                            <input id="upload" type="submit" name="submitTxt" value="View">
                        </form>
                    </div>
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
                            <th>Edit</th>
                            <th>Delete</th>
                            </tr>
                            <?php
                            if (isset($result)) {
                                while ($user = mysqli_fetch_assoc($result)) {
                            ?> 
                      
                      <tr>
                          
                          <td><?php echo $user["HAddress"];?></td>
                          <td><?php echo $user["Location"]; ?></td>
                          <td><?php echo $user["HomeType"]; ?></td>
                          <td><?php echo $user["HVname"]; ?></td>
                          <td><?php echo $user["Price"]; ?></td>
                          <td><?php echo $user["Amenities"]; ?></td>
                          <td><?php echo $user["Bedroom"]; ?></td>
                          <td><?php echo $user["Bathroom"]; ?></td>
                          <td><?php echo $user["Rooms"]; ?></td>
                          
                          <td><?php echo $user["Guests"]; ?></td>
                          <td><img src="upload/<?php echo $user["Himage"];?>" alt="Home Image" style='width:100px; height:100px;'></td>
                          <td><img src="upload/<?php echo $user["Bed_room"];?> " alt="Bedroom Image"  style='width:100px; height:100px;'></td>
                          <td><img  src="upload/<?php echo $user["Bath_room"];?>" alt="Bathroom Image" style='width:100px; height:100px;'></td>
                          <td><img  src="upload/<?php echo $user["Dinningroom"];?>" alt="Dinning Image" style='width:100px;height:100px;'></td>
                          <td><img  src="upload/<?php echo $user["Living"];?>" alt="Living Image" style='width:100px; height:100px;'></td>
                           <td><a href="../php/host_update.php?editid=<?php echo htmlentities($user['homeid']);?>"><input type="submit" id="upload" name="editTxt" value="Edit"></a></td>  

                           <td><a href="../php/host_view.php?delid=<?php echo htmlentities($user["homeid"]); ?>" onclick="return confirm('Do you really want to delete')"><input id="upload" type="submit" name="deleteBtn" value="Delete" ></a></td>
                              
                      </tr>
                     
                      
                     <?php } }  ?> 
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
   </section>
   </section>
   <footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>
</html>
