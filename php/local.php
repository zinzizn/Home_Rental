<?php
session_start();

require_once('projectdb.php');
if (isset($_SESSION["uid"])) {
    $userid = $_SESSION["uid"];
    
}
$view_id=$_GET['home_id'];


$errorMessage = ""; // Initialize an empty error message

$userQuery = mysqli_query($conn, "SELECT uid FROM usertbl WHERE uid = '$userid'");
$row = mysqli_fetch_assoc($userQuery);
$uid = $row['uid'];

$homeQuery=mysqli_query($conn,"SELECT homeid FROM home WHERE homeid='$view_id'");
$row = mysqli_fetch_assoc($homeQuery);
$homeid = $row['homeid'];

if (isset($_POST['bookBtn'])) {
    $check_in = date('Y-m-d', strtotime($_POST['cid']));
    $check_out = date('Y-m-d', strtotime($_POST['cod']));
    $night=$_POST['totalnight'];
    $price=$_POST['total'];
    $payhost=$_POST['hostprice'];

    
    // Check if the selected date range overlaps with any existing bookings
    $check_query = "SELECT * FROM bookingtbl WHERE homeid = '$homeid' AND (
        (CIDate BETWEEN '$check_in' AND '$check_out' OR CODate BETWEEN '$check_in' AND '$check_out') OR
        ('$check_in' BETWEEN CIDate AND CODate OR '$check_out' BETWEEN CIDate AND CODate)
    )";

$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // This Home is not available for the selected dates.
    // echo "<script>
    //     alert('This Home is not available for the selected dates.')
    // </script>";

    echo "<script>window.location.href='../index.php'</script>";

} else{
    // Insert data into the database using prepared statements
    $bookingsql = "INSERT INTO bookingtbl (CIDate, CODate, totalnights,homeid,uid, price,hostprice) 
                   VALUES (?, ?, ?, ?, ?, ?,?)";
    $stmt = mysqli_prepare($conn, $bookingsql);
    mysqli_stmt_bind_param($stmt, "ssiiidd", $check_in, $check_out, $night,$homeid,$uid, $price,$payhost);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>document.location='../php/view.php'</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="../css/designav.css?v=1.5">
    <link rel="stylesheet" href="../css/booking.css?v=1.7">

    <script>
        
        const nrcElement = document.getElementById('nrc');

nrcElement.addEventListener('input', function () {
    const nrcValue = nrcElement.value;

    if (nrcValue.length !== 6) {
        nrcElement.setCustomValidity('Invalid NRC number. Please enter 6 digits.');
    } else {
        nrcElement.setCustomValidity('');
    }
});

    </script>
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
  transition: background-color 0.3s ease;}
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
    </header> <br>
    <section>
        <?php
        
        $bookid=$_GET['home_id'];
        $sql="SELECT * FROM home where homeid='$bookid'";
        $result=mysqli_query($conn,$sql);
        
        if($result){
            if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
        
        ?>
        <form method="post" class="paid_form">
                <div>
                <img class="imagebooking"src="./upload/<?php echo $row['Himage']; ?>" alt="Home Image" style='width:100%; height:30%;'>
                </div><br>
                <div class="olddata">
                   
                    <input type="text" name="HVname" id="hvname" value="<?php echo $row['HVname']; ?>" ><br><br>
                    <input type="text" name="add" value="<?php echo $row['HAddress']; ?>"><br><br>
                    <input type="text" name="price" id="oneprice" value="<?php echo $row["Price"];echo "ks"; ?>"><br>
                </div><br>
                  

                <div class="check" id="CID">
                <label for="CI">Check In Date</label><br>
                <input type="date" placeholder="Check In" id="checkInDate" oninput="updateDisplay()" name="cid" min="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="check" id="COD">
                <label for="CO">Check Out Date</label><br>
                <input type="date" placeholder="Check Out" id="checkOutDate" oninput="updateDisplay()" name='cod' min="<?php echo date('Y-m-d'); ?>">
                </div><br>
                <div class="unrc">
                <label for="tolday">Total Nights</label><br>
                <input type="number" name="totalnight" placeholder="Number Of Nights" id="night" >
                </div><br>
                <div class="unrc">
                        <label for="tol">Total Price</label><br>
                    <input type="number" name="total" placeholder="Total"  id="tol" >
            </div>
           
             <br>
             
                    <input type="hidden" name="hostprice" placeholder="Total"  id="host" >
            
  
                   

<div>

<button name="bookBtn" class="book"> Book Now </button><br>
</div>

<!-- For check-in and check-out date -->
<script>
    function updateDisplay() {
      // Get the input values
      var checkInDate = new Date(document.getElementById('checkInDate').value);
      var checkOutDate = new Date(document.getElementById('checkOutDate').value);

      // Calculate the difference in nights
      var timeDifference = checkOutDate - checkInDate;
      var nights = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

      // Assuming $row["Price"] is in some currency, parse it to a numeric value
      var price = parseFloat("<?php echo $row["Price"]; ?>");

      // Calculate the total price
      var totalPrice = nights * price;
      var hostprice=totalPrice-(totalPrice*0.01);

      // Update the placeholders
      document.getElementById('night').value = nights;
      document.getElementById('tol').value = totalPrice; 
      document.getElementById('host').value=hostprice;
      
    }
  </script>

     </form>
        <br><br>

        <?php }}}?>
                       
    </section>
    <br>
    <footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>
</html>