<?php
   define('DB_SERVER', 'shareddb-r.hosting.stackcp.net');
   define('DB_USERNAME', 'UserPRD-3132339d6e');
   define('DB_PASSWORD', 'Q£1q*xhD;||S');
   define('DB_DATABASE', 'UserPRD-3132339d6e');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   $conn = ' ';

   if (!$db) {
   	$conn = 'Database connection error';
   }else{
   	$conn = 'Database connection successful';
   }
?>