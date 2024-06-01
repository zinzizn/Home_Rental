<?php 
session_start();
require_once("projectdb.php");
if(isset($_SESSION["user"])){
    $user=$_SESSION["user"];
    
}
$sql="SELECT * FROM host";
$result=$conn->query($sql);
$row=mysqli_num_rows($result);

if(isset($_GET['delid'])){
    $delid=$_GET['delid'];
    $sql="DELETE FROM host WHERE hostid=$delid";
    $result=mysqli_query($conn,$sql);
    // echo "<script>alert('Data deleted....')</script>";
    echo "<script>window.location.href='../php/admin_host.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Host Details</title>
    <link rel="stylesheet" href="../css/designav.css?v=1.5">
    <link rel="stylesheet" href="../css/admin.css?v=1.8">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
    <nav>
    <a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
     
    <ul>
        <li><a class="style_a" href="../php/admin_view.php" >Users Details</a></li>
        <li class="active"><a href="../php/admin_host.php" >Hosts Details</a></li>
        <li><a class="style_a" href="../php/admin_home.php" >Home Details</a></li>
        <li><a class="style_a" href="../php/admin_feedback.php" >Feedback</a></li>
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
                        <h2>Host <b>Details</b></h2>
                    </div>
                </div>
                </div> 
                <table class="display table table-bordered" id="hidden-table-info">
                    <tbody>
                    <tr>
                            
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>NRC No</th>
                            <th>Phone No</th>
                            <th></th>
                        </tr>
                      <?php
                            
                            
                        if($row>0){
                           
                            /*Fetch record from tblusers */
                           while($row=mysqli_fetch_array($result)){

                            
                        ?> 
                        
                        <tr>
                            
                            <td><?php echo $row["FirstName"]; ?></td>
                            <td><?php echo $row["LastName"]; ?></td>
                            <td><?php echo $row["Email"]; ?></td>
                            <td><?php echo $row["nrccode"]."/".$row["nrccity"]."(".$row["nrc"].")".$row['nrcno']; ?></td>
                            <td><?php echo $row["phoneno"]; ?></td>
                            <td><a href="../php/admin_host.php?delid=<?php echo htmlentities($row["hostid"]); ?>" onclick="return confirm('Do you really want to delete')"><input class="delete" type="submit" name="deleteBtn" value="Delete" ></a></td>
                        </tr>
                       
                        
                       <?php  }} ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </section>
    <footer>
    <p>&copy; 2023 Airbnb. All rights reserved.</p>
    </footer>
</body>
</html>