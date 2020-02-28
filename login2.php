<?php

//electric boogaloo

include("config.php")
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$output = '';
$message = '';

if (array_key_exists("submit", $_POST)) {

  //database connection test
  if (mysqli_connect_error()) {
    $output='Error connecting to database';
    die("datbase connection error");
  }

  //Form validation, check if form is blank
}

?>

<form method="post">
  <h2 class="text-center">User Registration</h2>
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
  <div class="form-group">
    <button type="submit" name="add" class="btn btn-success btn-block">Register</button>
  </div>
</form>

<div id=error><?php echo $output?></div>


<form method="post">
  <h2 class="text-center">Log in</h2>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" placeholder="Bob.Thomas@gmail.com" required="required" id=usernameInput name="username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" placeholder="Password" required="required" id=passwordInput name="password">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">Log in</button>
  </div>
</form>