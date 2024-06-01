<?php 

require_once("projectdb.php");

if(isset($_POST['paidBtn'])){
    $payid=$_GET['paidid'];
    $pay=$_POST['topay'];
    $sql="UPDATE bookingtbl set status='$pay' where bid='$payid'";
    $result=mysqli_query($conn,$sql);
    if($result){
       
    echo "<script>document.location='../php/admin_view.php'</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paid to host</title>
    <link rel="stylesheet" href="../css/designav.css?v=1.2">
   <!--  <link rel="stylesheet" href="../css/host.css?v=1.5"> -->
    <style>
        form{
            padding:20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            width: 400px;
            margin-left: 35%;
        }
        input[type=text],input[type=number]{
            width: 100%;
            height: 30px;
        }
        button{
            border-style: none;
            background-color: #f55;
            font-size: 20px;
            height: 30px;
            width: 100%;
        }

        #back{
  color: #fff;
    font-size: 20px;
    background-color: #f55;
    border: none;
    padding: 10px 20px;
    box-shadow:  0 3px 6px rgba(0, 0, 0, 0.297);
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
    margin-left: 93%;
   margin-bottom: 15px;
}
    </style>
</head>
<body>
<header>
   
<a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
  
 </header><br>
 <section>

 
    <?php
    $payid=$_GET['paidid'];
     $sql="SELECT * FROM bookingtbl,home,host where bookingtbl.homeid=home.homeid AND home.hostid=host.hostid AND bookingtbl.bid='$payid'";
        $result=mysqli_query($conn,$sql);
         if($result){
            if (mysqli_num_rows($result) > 0){
                 while ($row = mysqli_fetch_assoc($result)){
    ?>
    <form method="post">
        
        <input type="text" value="<?php echo $row['FirstName'].$row['LastName']; ?>" disabled><br><br>
        <input type="text" value="<?php echo $row['Email']; ?>" disabled><br><br>
        <input type="text" value="<?php echo $row['HVname']; ?>" disabled><br><br>
        <input type="number" name="total" required value="<?php echo $row['hostprice']; ?>" disabled><br><br>
        <input type="checkbox" name="topay" id="pay"  value="Paid" <?php if (in_array('Paid',explode(', ', $row['status']))) echo 'checked'; ?> ><span style="font-size: 18px;color:red;">Paid</span> 
        <br>
        <br>
      
        <a href="../php/admin_view.php"><button  name="paidBtn" >Cancel</button></a>
        
    </form>
    <?php 
     } } }
    
    ?>
 </section>
</body>
</html>