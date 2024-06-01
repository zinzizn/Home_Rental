<?php
require_once("projectdb.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/Content.css?v=1.1">
<script src="../js/Content.js" defer></script>
<title>Help Center</title>
</head>

<style>
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
   margin-top: 2%
}
</style>

<body>

<div class="navbar">
<h1>Help Center</h1>
<input type="text" placeholder="Search..." id="searchBar" onkeyup="filterQuestions()">
</div>
<a href="../index.php"><input type="submit" value="Back" id="back"></a>
<section class="content" id="faqContent">
<div class="category">
<h2>Getting Started</h2>
<?php
    $sql="SELECT * FROM feedback where Quest_type='Getting Started'";
    $result=mysqli_query($conn,$sql);
    if($result){
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
?>
<div class="faq-item">
<h3 onclick="toggleAnswer(this)"><?php echo $row['Question']; ?></h3>
<p class="answer"><?php echo $row['Answer']; ?></p>
</div>

<?php } } } ?>

</div>

<div class="category">
<h2>Booking and Reservations</h2>
<?php
    $sql="SELECT * FROM feedback where Quest_type='Booking and Reservations'";
    $result=mysqli_query($conn,$sql);
    if($result){
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
?>
<div class="faq-item">
<h3 onclick="toggleAnswer(this)"><?php echo $row['Question']; ?></h3>
<p class="answer"><?php echo $row['Answer']; ?></p>
</div>

<?php } } } ?>
</div>

<div class="category">
<h2>Payments</h2>
<?php
    $sql="SELECT * FROM feedback where Quest_type='Payments'";
    $result=mysqli_query($conn,$sql);
    if($result){
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
?>
<div class="faq-item">
<h3 onclick="toggleAnswer(this)"><?php echo $row['Question']; ?></h3>
<p class="answer"><?php echo $row['Answer']; ?></p>
</div>

<?php } } } ?>
</div>

<div class="category">
<h2>For Hosts</h2>
<?php
    $sql="SELECT * FROM feedback where Quest_type='Hosts'";
    $result=mysqli_query($conn,$sql);
    if($result){
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
?>
<div class="faq-item">
<h3 onclick="toggleAnswer(this)"><?php echo $row['Question']; ?></h3>
<p class="answer"><?php echo $row['Answer']; ?>
</p>
</div>

<?php } } } ?>
</div>
</section>

<footer>
<p>Need more help? Contact our support team at 
<a href="mailto:airbnb@gmail.com">airbnb@gmail.com</a> 
<a href="tel:+09755373934">Call 09755373934</a>
<a href="tel:+09966941420">Call 09966941420</a></p>
</footer>

</body>

</html>