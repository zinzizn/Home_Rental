<?php
$host="localhost:3307";
$username="root";
$password="";
$dsn="airbnb";
 
$conn=new mysqli($host,$username,$password,$dsn);
 
if($conn->connect_error){
    die("Connection Failed!!");
}


?>