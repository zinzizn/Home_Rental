<?php
session_start();

require_once("projectdb.php");
if(isset($_SESSION["UEmail"])){
    $user=$_SESSION["UEmail"];
    $userid=$_SESSION['uid'];
}

if(isset($_POST['submitTxt'])){
    $mail = mysqli_real_escape_string($conn, $_POST['emailTxt']);

    $stmt = $conn->prepare("SELECT * FROM usertbl,bookingtbl WHERE usertbl.uid=bookingtbl.uid AND usertbl.UEmail=?");
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();

        if($data['UEmail'] == $mail){
            $query = "SELECT * FROM usertbl,bookingtbl WHERE usertbl.uid=bookingtbl.uid AND usertbl.UEmail=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $mail);
            $stmt->execute();
            $result = $stmt->get_result();
        }
    }
}

$payQuery=mysqli_query($conn,"SELECT bid FROM bookingtbl WHERE bookingtbl.uid='$userid'");
$row = mysqli_fetch_assoc($payQuery);
$bid = $row['bid'];



if(isset($_POST["paybtn"])){
    $totalcost=$_POST['totalprice'];
    
    $typeofcards=$_POST['cards'];
    $cardno=$_POST['card_number'];
    $expmonth=$_POST['expMonth'];
    $expyear=$_POST['expYear'];
    $cvv=$_POST['cvv'];

    

    $sql = "INSERT INTO paymenttbl (Amount,cardno, CVV, TypesOfCards, ExpMonth, ExpYear, bid) VALUES ('$totalcost','$cardno', '$cvv', '$typeofcards', '$expmonth', '$expyear', '$bid' )";
        $result = mysqli_query($conn, $sql);
          
          
          if ($result) {
            
             echo "<script>document.location='../index.php'</script>";
            
          
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

    <style>
#Amt,#card,#card_number,#expm,#expy,#cvv{
        width: 100%;
        height: 45px;
        border-radius:15px;
        font-size: 20px;
        box-shadow:  0 3px 6px rgba(0, 0, 0, 0.297);
}
    </style>
   
</head>
<body>

<header>
<nav>
<a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
    
        
    </nav>
 </header>
 <br>
<section>
<a href="../index.php" style=margin-left:93%;><input type="submit" value="Back" id="back"></a>
<div>
    <form method="post">
        <label for="mail">Email</label>
        <input type="email" name="emailTxt" id="mail" placeholder="Please Enter Your Email">
        <input type="submit" name="submitTxt" value="View">
    </form>
</div>

<?php
if (isset($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?> 
        <form  method="post">

            
        
            <label for="Amt">Total Amount</label>
            <input type="text" id="Amt" name="totalprice" value="<?php echo $row['price']; ?>">
           
            <div id="hostprice"></div>
            <br>

            <label for="card">Types of Card</label>
            <select name="cards" id="card">
                <option value="choose card" disabled selected>---Choose Card---</option>
                <option value="Visa Card">Visa Card</option>
                <option value="Master Card">Master Card</option>
            </select>
    <label for="card_number">Card Number:</label>
    <input type="text" id="card_number" name="card_number" maxlength="16" required placeholder="1111-2222-3333-4444" >
    <br>

    <label for="">Exp Month</label>
                        <select title="month" name="expMonth" id="expm">
                            <option value="Choose month" disabled selected>---Choose month---</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
    <br>
    <label for="">Exp year</label>
                            <select title="year" name="expYear" id="expy">
                                <option value="Choose year" disabled selected>---Choose year---</option>
                                
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                            </select>

    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" maxlength="4" required placeholder="1234">
    <br>
        <br>
        <button type="submit" name="paybtn" >Payment</button>
  </form>

        <?php
    }
}
?>
</section>
<br>

</body>
</html>
