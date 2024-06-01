<?php
session_start();
require_once("projectdb.php");
if(isset($_SESSION["user"])){
    $user=$_SESSION["user"];
    
}

if(isset($_POST['subBtn'])){
    $qid=$_GET["qid"];
    $questType=$_POST['QuestionType'];
    $question=$_POST['quest'];
    $answer=$_POST['answer'];

    $sql = "UPDATE feedback SET Answer=?, Quest_type=? WHERE fid=?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssi", $answer, $questType, $qid);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        
        echo "<script>document.location='../php/admin_feedback.php'</script>";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer</title>
    <link rel="stylesheet" href="../css/designav.css">
    <style>
/* Global styles */e
/* Global styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
.logo img {
    max-width: 100px;
    margin-left: 20%;
}
section {
    max-width: 600px;
    margin: 0 auto;
    padding: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    background-color: #fff;
}

/* Input and Textarea Styles */
input[type="text"],
input[type="email"],
input[type="number"],
input[type="date"],
select,
textarea {
    width: 90%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="number"]:focus,
input[type="date"]:focus,
select:focus,
textarea:focus {
    outline: none;
    border-color: #555;
}

/* Hover effect for input fields */
input[type="text"]:hover,
input[type="email"]:hover,
input[type="number"]:hover,
input[type="date"]:hover,
select:hover,
textarea:hover {
    border-color: #007bff;
}

textarea {
    resize: vertical;
}

/* Button Styles */
button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

/* ... Rest of the CSS code ... */


/* Button Styles */
button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button {
    background-color: #f55;
}

/* ... Rest of the CSS code ... */

    </style>
</head>
<body>
<header>
   
<a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
  
 </header><br>
 <section>
 <?php
       $qid=$_GET["qid"];
       $sql="SELECT * FROM  feedback where fid='$qid'";
        $result=mysqli_query($conn,$sql);
        if($result){
            if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){

?>
    <form method="post">
        <h2>Answer the Question!</h2>
        <select name="QuestionType" id="quest">
            <option value="choose">-----Choose Type of Question-----</option>
            <option value="Getting Started">Getting Started</option>
            <option value="Booking and Reservations">Booking and Reservations</option>
            <option value="Payments">Payments</option>
            <option value="Hosts"> Hosts</option>
        </select><br><br>
        <textarea name="quest"  cols="30" rows="10"><?php echo $row['Question']; ?></textarea><br>
        <textarea name="answer"  cols="30" rows="10"></textarea><br>
        <button type="submit" class="submit-btn" name="subBtn">Submit</button>
        <a href="../php/admin_feedback.php"><button type="submit" class="submit-btn" name="subBtn">Cancel</button></a>
    </form>
    <?php } } } ?>
 </section><br>
 <footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>
</html>