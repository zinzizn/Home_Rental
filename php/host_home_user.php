<?php 
session_start();

require_once("projectdb.php");
if(isset($_SESSION["user"])){
    $user=$_SESSION["user"];
    
}

if(isset($_POST['submitTxt'])){
    $mail=mysqli_real_escape_string($conn,$_POST['emailTxt']);

    $stmt=$conn->prepare("SELECT * FROM user_booking WHERE Email=?");
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();

        if($data['Email'] == $mail){
            $query = "SELECT * FROM user_booking WHERE Email=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $mail);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = mysqli_num_rows($result);
        }
    }

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="../css/designav.css?v=1.6">
    <link rel="stylesheet" href="../css/host.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        section{
            margin: 5%;
        }
    </style>
   
</head>
<body>
<header>
<nav class="adminnav">
<a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
    <ul>
        <li><a class="style_a" href="../php/host_view.php">View</a></li>
        <li class="active"><a class="style_a" href="../php/host_home_user.php" style="color:white ;">Home user</a></li>
        <li><a class="style_a" href="../php/logout.php">Logout</a></li>
    </ul>
 </nav>
  </header>
  <section>
<div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>User <b>Details</b></h2>
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
                            <th>Name</th>
                            <th>Email</th>
                            
                            <th>Place Name</th>
                            
                            <th>Check In Date</th>
                            <th>Check Out Date</th>
                            
                        </tr>
                        <?php
                            if (isset($result)) {
                                while ($user = mysqli_fetch_assoc($result)) {
                            ?> 
                        
                        <tr>
                            <td><?php echo $user["UserName"]; ?></td>
                            <td><?php echo $user["UEmail"]; ?></td>
                            
                            <td><?php echo $user["HVname"]; ?></td>
                            
                            
                            <td><?php echo $user["CIDate"]; ?></td>
                            <td><?php echo $user["CODate"]; ?></td>
                           

                            
                        </tr>
                       
                        
                       <?php }} ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </section>
    
    <footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>
</html>