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
      $message = "That username is already taken.";
    }else{

      $firstName = mysqli_real_escape_string($db, $_POST["firstName"]);
      $lastName = mysqli_real_escape_string($db, $_POST["lastName"]);
      $userName = mysqli_real_escape_string($db, $_POST["username"]);
      $passwordCreate = mysqli_real_escape_string($db, $_POST["password"]);

      $query = "INSERT INTO `Users` (`FirstName`, `LastName`, `username`, `Password`) VALUES ('$firstName', '$lastName', '$userName', '$passwordCreate');";

      mysqli_query($db, $query);

      //Salt and Update Password
      $salt = md5(mysqli_insert_id($db));
      $saltedPass = $salt.$_POST['password'];
      $passwordHash = hash($saltedPass, PASSWORD_BCRYPT);
      $query = "UPDATE `Users` SET `Password` = '$passwordHash' ";

      mysqli_query($db, $query);

      $output = "Registration successful";
    }
  }

  if ($_POST['registration']==0) {
    $query = "SELECT `*` FROM `Users` WHERE `username` = '".mysqli_real_escape_string($db, $_POST['username'])."' LIMIT 1";

    $row = mysqli_fetch_array(mysqli_query($db, $query), MYSQLI_ASSOC);
    if (array_key_exists('UserID', $row)) {
      $salt = md5($row['UserID']);
      $saltedPass = $salt.$_POST['password'];
      $hashedPassword = hash($saltedPass, PASSWORD_BCRYPT);
      if ($hashedPassword == $row['Password']) {
        $_SESSION['login_user'] = $userName;
        header("location: index.php");
        
      }else{
        $message = "Invalid password";
      }
    }else{
      $message = "Invalid username";
    }
  }

}else{
  $output = "no post";
}
?>

<form method="post">
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



<form method="post">
  <h2 class="text-center">Log in</h2>
  <div id=error><?php echo $message ?></div>
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
</form>