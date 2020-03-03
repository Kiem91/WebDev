<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select * from `Users` where `username` = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
   
   $userFirstName = $row['FirstName'];
   $userLastName = $row['LastName'];


   if(!isset($_SESSION['login_user'])){
      header("location:login2.php");
   }
?>