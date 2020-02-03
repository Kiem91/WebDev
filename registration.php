<?php
 include("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);


if($_POST["password"]!==$_POST["passwordConfirm"]){
  $output .='<label class="text-warn">Password and Confirm Password do not match.</label>';
}

 if(!empty($_POST)){
  $output = '';
  $message = '';
  $firstName = mysqli_real_escape_string($db, $_POST["firstName"]);
  $lastName = mysqli_real_escape_string($db, $_POST["lastName"]);
  $userName = mysqli_real_escape_string($db, $_POST["username"]);



  $passwordCreate = mysqli_real_escape_string($db, $_POST["passwordCreate"]);
  $query = "INSERT INTO `Users`(`FirstName`, `LastName`, `username`, `Password`) VALUES('$firstName', '$lastName', '$userName', '$passwordCreate');";
  /*if($_POST["email"] != ''){
    if (!preg_match("/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/", $emailAddress)) {
    $message = "Invaid email address.";
    }*/


    //Response
    //Checking to see if name or email already exsist
    if(mysqli_num_rows($query) > 0) {
      $message = "That username, already exists.";
    }elseif(!mysqli_query($db, $sql)) {
      $message = 'Could not insert';
    }else {
      $message = "Thank you, " . $_POST['name'] . ". Your information has been inserted.";}$
    }
    if(mysqli_query($db, $query)){
      $output .= '<label class="text-success">' . $message . '</label>';
    }
    echo $output;
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
                  <label for="firstName">Fisrt name</label>
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
                  <button type="button" name="add" id="registerUserBtn" class="btn btn-success btn-block">Register</button>
                </div>
            </form>
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

    <script type="text/javascript">
    	             $(document).ready(function() {
                <!--#my-form grabs the form id-->
                $("#my-form").submit(function(e) {
                    e.preventDefault();
                    $.ajax( {
                        <!--insert.php calls the PHP file-->
                        url: "insert.php",
                        method: "post",
                        data: $("form").serialize(),
                        dataType: "text",
                        success: function(strMessage) {
                            $("#message").text(strMessage);
                            $("#my-form")[0].reset();
                        }
                    });
                });
            });
    </script>


  </body>
</html>