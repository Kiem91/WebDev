<?php
include("config.php");
session_start();
$error = '';
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username sent from form 
  $myusername = mysqli_real_escape_string($db,$_POST['username']);
  //get user from database
  $sql = "SELECT `ID` FROM `Users` WHERE `username` = '$myusername'";
  $result = mysqli_query($db,$sql);

  //number of users with submitted username
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    //get user variables
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if (array_key_exists("ID", $row)) {
      $hashedPassword = md5(md5($row['ID']).$_POST['password']);
    if ($hashedPassword == $row['Password']) {
      $_SESSION['login_user'] = $myusername;
      header("location: index.php");
    }else{$error = "Your Login Name or Password is invalid";}}
  }
}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <link rel="stylesheet" type="text/css" href="base.css"/>

    <title>Login</title>
  </head>
  <body id="loginPage">

    <div class="container">
      <div class="row">
        <div class="col"></div>
        <div class="col-6">
          <div class="login-form frame">
            <form action="" method="post">
              <h2 class="text-center">Log in</h2>       
                <div class="form-group">
                  <label for="username">Email address</label>
                  <input type="text" class="form-control" placeholder="Bob.Thomas@gmail.com" required="required" id=usernameInput name="username">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Password" required="required" id=passwordInput name="password">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Log in</button>
                  <button type="button" id="registerUserBtn" data-toggle="modal" class="btn btn-success btn-block" onclick="window.location.href = 'registration.php';">Register</button>
                </div>
            </form>
            <div id=error><?php echo $error?></div>
          </div>
        </div>
        <div class="col"></div>
      </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>