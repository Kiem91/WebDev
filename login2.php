<?php
//electric boogaloo
include("config.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$output = '';
$message = '';

if (!is_null($_POST)) {

  //database connection test
  if ($conn != "Database connection successful") {
    //$message=$conn;
    die($conn);
  }

  //Form validation, check if form is blank

  //Register
  if ($_POST['registration']==1) {
    $query = "SELECT `UserID` FROM `Users` WHERE `username` = '".mysqli_real_escape_string($db, $_POST['username'])."' LIMIT 1";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
      $output = "That username is already taken.";
    }else{

      $firstName = mysqli_real_escape_string($db, $_POST["firstName"]);
      $lastName = mysqli_real_escape_string($db, $_POST["lastName"]);
      $userName = mysqli_real_escape_string($db, $_POST["username"]);
      $passwordCreate = mysqli_real_escape_string($db, $_POST["password"]);

      $query = "INSERT INTO `Users` (`FirstName`, `LastName`, `username`, `Password`, `Type`) VALUES ('$firstName', '$lastName', '$userName', '$passwordCreate', 'User');";

      mysqli_query($db, $query);

      //Salt and Update Password
      $salt = md5(mysqli_insert_id($db));
      $saltedPass = $salt.$_POST['password'];
      $passwordHash = md5($saltedPass);
      $query = "UPDATE `Users` SET `Password` = '$passwordHash' WHERE `username` = '$userName' ";

      mysqli_query($db, $query);

      $output = "Registration successful";
    }
  }

  //Login
  if ($_POST['registration']==0) {
    $search = mysqli_real_escape_string($db, $_POST['username']);
    $query = "SELECT `UserID`, `username`, `Password` FROM `Users` WHERE `username` = '$search' LIMIT 1";

    
    $row = mysqli_fetch_array(mysqli_query($db, $query), MYSQLI_ASSOC);
    if (array_key_exists("username", $row)) {

      //Get ID and reverse engineer hash
      $salt = md5($row['UserID']);
      $saltedPass = $salt.$_POST['password'];
      $hashedPassword = md5($saltedPass);

      if ($hashedPassword == $row['Password']) {
        //Login should be successful, set session variable and redirect to home page.
        $_SESSION['login_user'] = $search;
        header("location: index.php");  
      }else{
        $message = "Invalid username or password.";
      }
    }else{
      $message = "Invalid username or password.";
    }
  }

}else{
  $output = "no post";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login & Registration</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

      <link rel="stylesheet" type="text/css" href="base.css"/>
  </head>

  <body id="LoginBody">

    <div id="shell" class="container">
      <div class="row">
        <div class="col-6">
          <div id="RegContainer" class="container frame">
            <form name="registerForm" onsubmit="return(registrationValidation());" method="post">
              <h2 class="text-center">User Registration</h2>
              <div id=error><?php echo $output ?></div>
              <div class="form-group">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" placeholder="Bob" required="required" id=firstName name="firstName">
              </div>
              <div class="form-group">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" placeholder="Thomas" required="required" id=lastName name="lastName">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="bthomas" required="required" id=username name="username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" required="required" id=password name="password">
              </div>
              <div class="form-group">
                <label for="passwordConfirm">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password" required="required" id=passwordConfirm name="passwordConfirm">
              </div>
              <input type="hidden" name="registration" value="1">
              <div class="form-group">
                <button type="submit" name="add" class="btn btn-success btn-block">Register</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-6">
          <div id="LoginContainer" class="container frame">
            <form name="loginForm" onsubmit="return(loginValidation());" method="post">
              <h2 class="text-center">Log in</h2>
              
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Bob.Thomas@gmail.com" required="required" id=usernameInput name="username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" required="required" id=passwordInput name="password">
              </div>
              <input type="hidden" name="registration" value="0">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
              </div>
              <div id=error><?php echo $message ?></div>
            </form>
          </div>
        </div>
      </div>
    </div>


      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

      <script type="text/javascript">
         //register form validation
         function registrationValidation() {
          if(document.registerForm.firstName.value == ""){
          alert( "Please provide your name!" );
          document.registerForm.firstName.focus() ;
          return false;
        }
        if(document.registerForm.lastName.value == ""){
          alert( "Please provide your name!" );
          document.registerForm.lastName.focus() ;
          return false;
        }
        if(document.registerForm.username.value == ""){
          alert( "Please choose a username." );
          document.registerForm.username.focus() ;
          return false;
        }
        if(document.registerForm.password.value == ""){
          alert( "Please provide a password" );
          document.registerForm.password.focus() ;
          return false;
        }
        if(document.registerForm.passwordConfirm.value == ""){
          alert( "Please confirm your password" );
          document.registerForm.passwordConfirm.focus() ;
          return false;
        }
        if(document.registerForm.passwordConfirm.value != document.registerForm.password.value){
          alert( "The passwords you entered do not match." );
          document.registerForm.password.focus() ;
          return false;
        }
         }

         //login form validation
         function loginValidation() {
          if((document.loginForm.username.value == "")||(document.loginForm.password.value == "")){
          alert( "Invalid username or password" );
          document.loginForm.username.focus() ;
          return false;
        }
         }
      </script>

  </body>

</html>