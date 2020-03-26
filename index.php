<?php
  session_start();
  include('config.php');
     
  $user_check = $_SESSION['login_user'];
     
  $ses_sql = mysqli_query($db,"select * from `Users` where `username` = '$user_check' ");
     
  $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
     
  $userFirstName = $row['FirstName'];
  $userLastName = $row['LastName'];


  if(!isset($_SESSION['login_user'])){
      header("location:login2.php");
   }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="base.css"/>

    <title>Home Page</title>
  </head>
  <body id="mainBody">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">MDAVIS91.TECH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sections
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="1-HTML/index.php">HTML</a>
            <a class="dropdown-item" href="2-CSS/index.php">CSS</a>
            <a class="dropdown-item" href="3-Javascript/index.php">JavaScript</a>
            <a class="dropdown-item" href="4-JQuery/index.php">JQuery</a>
            <a class="dropdown-item" href="5-Bootstrap/index.php">Bootstrap 4</a>
            <a class="dropdown-item" href="7-PHP/index.php">PHP</a>
            <a class="dropdown-item" href="8-SQL/index.php">MySQL</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <p></p>Hello <?php echo $userFirstName; ?>!</p>
        
      </form>
    </div>
  </nav>


  <div class="jumbotron light" id="intro">
    <h1>Hello <?php echo $userFirstName; ?>!</h1>
    <p>intro text</p>
  </div>

  <div class="container buffer">
    <div class="card-deck">
      

        <div class="card-body">
          <h5 class="card-title">HTML Works</h5>
          <p class="card-text">The foundation of the web.</p>
          <button type="button" onclick="window.location.href = '1-HTML/index.html'" class="btn btn-success btn-block">Check it out!</button>
        </div>
      </div> 
      

      <div id="css_card" class="card">
        <img src="resources/images/logos/CSS3_logo.svg" class="img-fluid img-banner" alt="...">
        <div class="card-body">
          <h5 class="card-title">CSS Works</h5>
          <p class="card-text">Making the web beautiful.</p>
          <button type="button" onclick="window.location.href = '2-CSS/index.html'" class="btn btn-primary btn-block">Check it out!</button>
        </div>
      </div> 
      

      <div id="js_card" class="card">
        <a href="3-Javascript/index.html" class="card-img-top"><img src="resources/images/logos/JavaScript_logo.svg" class="img-fluid img-banner" alt="..."></a>
        <div class="card-body">
          <h5 class="card-title">JavaScript</h5>
          <p class="card-text">Making the web responsive.</p>
          <button type="button" onclick="window.location.href = '3-Javascript/index.html'" class="btn btn-warning btn-block">Check it out!</button>
        </div>
      </div>

    </div>
  </div>

  <div class="container buffer">
    <div class="card-deck">
      
      <div id="jquery_card" class="card h-100">
        <a href="4-JQuery/index.html" class="card-img-top img-banner"><img src="resources/images/logos/jquery_logo.svg" class="card-img-top img-banner" alt="..."></a>
        <div class="card-body">
          <h5 class="card-title">JQuery</h5>
          <p class="card-text">Uhhhh</p>
          <button type="button" onclick="window.location.href = '4-JQuery/index.html'" class="btn btn-warning btn-block">Check it out!</button>
        </div>
      </div> 
      

      <div id="bootstrap_card" class="card h-100">
        <a href="5-Bootstrap/index.html" class="card-img-top img-banner"><img src="resources/images/logos/bootstrap_logo.svg" class="card-img-top img-banner" alt="..."></a>
        <div class="card-body">
          <h5 class="card-title">Bootstrap</h5>
          <p class="card-text">Responsive CSS templates for any device.</p>
          <button type="button" onclick="window.location.href = '5-Bootstrap/index.html'" class="btn btn-warning btn-block">Check it out!</button>
        </div>
      </div> 
      

      <div id="..." class="card h-100">
        <a href="6-Wordpress/index.html" class="card-img-top img-banner"><img src="resources/images/logos/Wordpress_logo.svg" alt="..."></a>
        <div class="card-body">
          <h5 class="card-title">Wordpress</h5>
          <p class="card-text">Create a beautiful, custom website without knowing how to code.</p>
          <button type="button" onclick="window.location.href = '6-Wordpress/index.html'" class="btn btn-warning btn-block">Check it out!</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="container buffer">
    <div class="card-deck">
      
      <div id="..." class="card h-100">
        <a href="7-PHP/index.php" class="card-img-top img-banner"><img src="resources/images/logos/PHP_logo.svg" alt="..."></a>
        <div class="card-body">
          <h5 class="card-title">PHP</h5>
          <p class="card-text">Server side scripting</p>
          <button type="button" onclick="window.location.href = '7-PHP/index.php'" class="btn btn-warning btn-block">Check it out!</button>
        </div>
      </div> 
      

      <div id="..." class="card h-100">
        <a href="8-SQL/userTable.php" class="card-img-top img-banner"><img src="resources/images/logos/SQL_logo.svg" alt="..."></a>
        <div class="card-body">
          <h5 class="card-title">SQL</h5>
          <p class="card-text">Storing the web's data</p>
          <button type="button" onclick="window.location.href = '8-SQL/userTable.php'" class="btn btn-warning btn-block">Check it out!</button>
        </div>
      </div>
      

      <div id="..." class="card h-100">
        <img src="resources/images/API_logo.svg" class="card-img-top img-banner" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
      
    </div>
  </div>

  <div class="container buffer">
    <div class="card-deck">
      
      <div id="..." class="card h-100">
        <img src="resources/images/Python_logo.svg" class="card-img-top img-banner" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div> 
      

      <div id="..." class="card h-100">
        <img src="resources/images/CSS3_logo.svg" class="card-img-top img-banner" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div> 
      

      <div id="..." class="card h-100">
        <img src="resources/images/JavaScript_logo.svg" class="card-img-top img-banner" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
       Custom Script
    </script>


  </body>
</html>
