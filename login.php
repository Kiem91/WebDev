<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT `email` FROM `Users` WHERE `email` = '$myusername' and `password` = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
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
                  <button type="button" name="add" id="registerUserBtn" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success btn-block">Register</button>
                </div>
            </form>
          </div>
        </div>
        <div class="col"></div>
      </div>
    </div>


       <div id="add_data_Modal" class="modal fade">  
        <div class="modal-dialog">  
          <div class="modal-content">  
            <div class="modal-header">   
            <h4 class="modal-title">User Registration</h4>  
            </div>  
              <div class="modal-body">  
                <form method="post" id="insert_form">  
                  <label>First Name</label>  
                  <input type="text" name="firstName" id="firstName" class="form-control" />  
                  <br />  

                  <label>Last Name</label>  
                  <input type="text" name="lastName" id="lastName" class="form-control" />  
                  <br /> 

                  <label>Email Address</label>  
                  <input type="text" name="emailAddress" id="emailAddress" class="form-control" />  
                  <br /> 

                  <label>Password</label>  
                  <input type="password" name="password" id="passwordCreate" class="form-control" />  
                  <br />

                  <label>User Type</label>
                  <select class="form-control" name="userType" id="userType">
                    <option>user</option>
                    <option>test</option>
                  </select>
                  <br />

                  <input type="hidden" name="id" id="id" />  
                  <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                </form>  
              </div>    
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
        $(document).ready(function(){  
          $("#insert_form").submit(function(e){
            e.preventDefault();
            $.ajax({
              url:"8-SQL/fetch.php",
              method:"POST",
              data:$("#insert_form").serialize(),
              dataType:"text",
              success:function(strMessage){
                $("#message").text(strMessage);
                $("#insert_form")[0].reset();
              }
            });
          });
        }); 

    </script>

    	


  </body>
</html>


https://www.derekshidler.com/inserting-form-data-into-mysql-using-php-and-ajax/