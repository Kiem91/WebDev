<?php
 include("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

 if($_SERVER["REQUEST_METHOD"] == "POST"){

  $output = '';
  $message = '';
  $firstName = mysqli_real_escape_string($db, $_POST["firstName"]);
  $lastName = mysqli_real_escape_string($db, $_POST["lastName"]);
  $userName = mysqli_real_escape_string($db, $_POST["username"]);

  $passwordCreate = mysqli_real_escape_string($db, $_POST["password"]);
  
  $query = "INSERT INTO `Users`(`FirstName`, `LastName`, `username`, `Password`) VALUES('$firstName', '$lastName', '$userName', '$passwordCreate');";
  

    //Response
    //Checking to see if name or email already exsist
    $check = "SELECT `username` FROM `Users` WHERE `username` = '$userName'; ";
    if(mysqli_query($db,$check)){
      $message = 'That username, already exists.';
    }elseif(!mysqli_query($db, $query)){
      $message = 'Could not insert';
    }elseif(mysqli_query($db, $query)){
      //Insert data into database
      mysqli_query($db, $query);

      $message = "Thank you, " . $_POST['name'] . ". Your information has been inserted.";
      
      //salt and update password
      $salt = md5(mysql_insert_id());
      $passwordHash = hash('md5',$_POST['password'].$salt );
      $query = "UPDATE `Users` SET `Password` = '$passwordHash' ";

      mysqli_query($db, $query);
      $output .= '<label class="text-success">' . $message . '</label>';

      //redirect user to login page
      header("location: login.php");
    }
    echo $output;
  }else{
    header("location: test.html");
  }
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Registration</title>
  </head>
  <body>

<div class="container">
      <div class="row">
        <div class="col"></div>
        <div class="col-6">
          <div class="login-form frame">
            <form action="" method="post">
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
                  <input type="text" class="form-control" placeholder="Bob.Thomas@gmail.com" required="required" id=username name="username">
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