  <?php  
include (..\config.php);  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $firstName = mysqli_real_escape_string($connect, $_POST["firstName"]);  
      $lastName = mysqli_real_escape_string($connect, $_POST["lastName"]);   
      $emailAddress = mysqli_real_escape_string($connect, $_POST["emailAddress"]);  
      $passwordCreate = mysqli_real_escape_string($connect, $_POST["passwordCreate"]);  
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