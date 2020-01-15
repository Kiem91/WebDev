  <?php  
 define('ROOT_PATH', dirname(__DIR__) . '/');
 include(ROOT_PATH.'config.php');

 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $firstName = mysqli_real_escape_string($db, $_POST["firstName"]);  
      $lastName = mysqli_real_escape_string($db, $_POST["lastName"]);   
      $emailAddress = mysqli_real_escape_string($db, $_POST["emailAddress"]);  
      $passwordCreate = mysqli_real_escape_string($db, $_POST["passwordCreate"]);  
      if($_POST["id"] != ''){ 
           $query = "INSERT INTO `Users`(`FirstName`, `LastName`, `Email`, `Password`) VALUES('$firstname', '$lastname', '$email', '$password');";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           
      }  
      echo $output;  
 }  
 ?>