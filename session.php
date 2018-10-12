<?php
include_once("config.php");
if (!isset($_SESSION)) { session_start(); }

$user_check = $_SESSION['userName'];
    $query = "SELECT user_name FROM users WHERE user_name = '$user_check'";
    $ses_sql = mysqli_query($db, $query);
    
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    
    $login_session_name = $row["user_name"];
    
    if(!isset($_SESSION["userName"])){
        header("location: login.php");
    }
?>