<?php



require_once("projectdb.php");

$result = null;
if(isset($_POST['submitTxt'])){
    $mail = mysqli_real_escape_string($conn, $_POST['emailTxt']);

    $stmt = $conn->prepare("SELECT * FROM usertbl WHERE usertbl.UEmail=?");
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();

        if($data['UEmail'] == $mail){
            $query = "SELECT * FROM usertbl,bookingtbl,home WHERE usertbl.uid=bookingtbl.uid AND bookingtbl.homeid=home.homeid AND usertbl.UEmail=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $mail);
            $stmt->execute();
            $result = $stmt->get_result();
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
    <link rel="stylesheet" href="../css/designav.css?v=1.7">
    <link rel="stylesheet" href="../css/slip.css?v=1.5">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   
</head>
<body>

<header>
<nav>
<a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
    
        
    </nav>
 </header>
 <br>
<section>
<div>
    <form method="post">
        <label for="mail">Email</label>
        <input type="email" name="emailTxt" id="mail" placeholder="Please Enter Your Email">
        <input type="submit" name="submitTxt" value="View">
    </form>
</div>

<?php



if ($result !== null && mysqli_num_rows($result) > 0){
  while ($row = mysqli_fetch_assoc($result)){

?> 
        <div class="booksuf">
        <h1>Booking Successful!</h1>
        <p style=font-size:15px;>To secure your reservation, kindly confirm within the next 3 days. Failure to confirm within this timeframe will result int an automatic cancellation. If you have any questions or need assistance, please reach out as soon as possible.</p>
        <hr>
        <h1>Email: <?php echo $row['UEmail']; ?> </h1>
        <p>Date: from- <span><?php echo $row['CIDate']; ?></span>
            to- <span><?php echo $row['CODate']; ?></span>
        </p>
        <p>Place Name: <?php echo $row['HVname']; ?></p>
        <p>Place: <?php echo $row['HAddress']; ?></p>
        <p>Total: <?php echo $row['price'];?> </p>
        <p style=font-size:18px;color:red;>*To ensure a smooth experience, please remember to complete your payment before 1 day of your check-in date ! ! !</p>
        <a href="../php/payment.php"><input type="submit" value="Confirm"></a>
        <a href="../index.php"><input type="submit" value="Cancel"></a>
        </div>
        <?php }}?>
</section>
<br>
<!-- <footer>
    <p>&copy; 2023 Airbnb. All rights reserved.</p>
    </footer> -->
</body>
</html>
