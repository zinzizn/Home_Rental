<?php 

require_once("projectdb.php");

$sql="SELECT * FROM usertbl,home,bookingtbl,paymenttbl WHERE usertbl.uid=bookingtbl.uid AND home.homeid=bookingtbl.homeid AND bookingtbl.bid=paymenttbl.bid";
$result=$conn->query($sql);
$row=mysqli_num_rows($result);


if(isset($_GET['delid'])){
    $delid=$_GET['delid'];

    echo $delid;

    $sql="DELETE FROM usertbl WHERE uid=$delid";
    $result=mysqli_query($conn,$sql);
    // echo "<script>alert('Data deleted....')</script>";
    echo "<script>window.location.href='../php/admin_view.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="../css/designav.css?v=1.6">
    <link rel="stylesheet" href="../css/admin.css?v=1.8">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   
</head>
<body>
<header>
<nav>
<a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
  <ul>
      <li class="active"><a href="../php/admin_view.php">Users Details</a></li>
      <li ><a class="style_a" href="../php/admin_host.php">Hosts Details</a></li>
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
                        <h2>User <b>Details</b></h2>
                    </div>
                </div>
                </div> 
                <table class="display table table-bordered" id="hidden-table-info">
                    <tbody>
                    <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Passport No</th>
                            <th>NRC No</th>
                            <th>Types of Cards</th>
                            <th>Place Name</th>
                            <th>Place Address</th>
                            <th>Total Amount</th>
                            <th>Check In Date</th>
                            <th>Check Out Date</th>
                            <th></th>
                            <th>Pay to host</th>
                            <th></th>
                        </tr>
                      <?php
                        if($row>0){
                           /*Fetch record from registertbl */
                           while($row=mysqli_fetch_array($result)){

                            
                        ?> 
                        
                        <tr>
                            <td><?php echo $row["UserName"]; ?></td>
                            <td><?php echo $row["UEmail"]; ?></td>
                            <td><?php echo $row["passportno"]; ?></td>
                            <td><?php echo $row["nrc"]."/".$row["nrccity"]."(".$row["nrccode"].")".$row['NRCno']; ?></td>
                            <td><?php echo $row["TypesOfCards"]; ?></td>
                            <td><?php echo $row["HVname"]; ?></td>
                            <td><?php echo $row["HAddress"]; ?></td>
                            <td><?php echo $row["price"]; ?></td>
                            <td><?php echo $row["CIDate"]; ?></td>
                            <td><?php echo $row["CODate"]; ?></td>
                            <td>
    <a id="paidLink" href="../php/host_paid.php?paidid=<?php echo htmlentities($row['bid'])?>">
        <button type="button" class="click btn" onclick="redirectToNextPage();">Click to Paid</button>
    </a>
</td>
<script>
function redirectToNextPage() {
    // Disable the button
    document.querySelector('.click.btn').disabled = true;

    // Redirect to the next page
    window.location.href = document.getElementById('paidLink').href;
}
</script>
                            <td id="msg"><?php echo $row["status"]; ?></td>
                            


                           
                            <td><a href="../php/admin_view.php?delid=<?php echo htmlentities($row["bid"]); ?>" onclick="return confirm('Do you really want to delete')"><input class="delete" type="submit" name="deleteBtn" value="Delete" ></a></td>
                        </tr>
                       
                        
                       <?php }} ?> 
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