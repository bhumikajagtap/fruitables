<?php
$con = mysqli_connect('localhost','root','','jewellarydb');

if(!$con){
    die("Database connection failed: " . mysqli_connect_error());
}
?>