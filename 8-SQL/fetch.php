  <?php  
 //fetch.php  
 $connect = mysqli_connect("shareddb-r.hosting.stackcp.net", "UsersTemp-313233cb1c", "qgmv0cxycc", "UsersTemp-313233cb1c");  
 if(isset($_POST["id"]))  
 {  
      $query = "SELECT * FROM users WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>