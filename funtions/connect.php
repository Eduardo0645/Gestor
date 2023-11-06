<?php
session_start();
$hostname="localhost";
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$conn = mysqli_connect($hostname, $username, $password);
?>

