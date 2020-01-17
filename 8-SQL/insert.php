<?php  
 define('ROOT_PATH', dirname(__DIR__) . '/');
 include(ROOT_PATH.'config.php');

 if(!empty($_POST)){
  $output = '';
  $message = '';
  $firstName = mysqli_real_escape_string($db, $_POST["firstName"]);
  $lastName = mysqli_real_escape_string($db, $_POST["lastName"]);
  $emailAddress = mysqli_real_escape_string($db, $_POST["emailAddress"]);
  $passwordCreate = mysqli_real_escape_string($db, $_POST["passwordCreate"]);
  $query = "INSERT INTO `Users`(`FirstName`, `LastName`, `Email`, `Password`) VALUES('$firstName', '$lastName', '$emailAddress', '$passwordCreate');";
  if($_POST["email"] != ''){
    if (!preg_match("/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/", $emailAddress)) {
    $message = "Invaid email address.";
    }


    //Response
    //Checking to see if name or email already exsist
    if(mysqli_num_rows($query) > 0) {
      echo "The name, " . $_POST['name'] . ", or email, " . $_POST['email'] . ", already exists.";
    }elseif(!mysqli_query($db, $sql)) {
      echo 'Could not insert';
    }else {
      echo "Thank you, " . $_POST['name'] . ". Your information has been inserted.";}$message = 'Data Inserted';
    }
    if(mysqli_query($db, $query)){
      $output .= '<label class="text-success">' . $message . '</label>';
    }
    echo $output;
  }
?>