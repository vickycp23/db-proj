<?php
include('connection.php');
session_start();

$user_check = $_SESSION['username'];

$ses_sql = mysqli_query($con,"select user from user where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['username'];

if(!isset($_SESSION['username'])){
    header("location:login.php");
    die();
}