<?php
   include('session.php');
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
  <body>

  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Link</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Dropdown
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>


<div class="album">
    <div class="container">
    	<div class="container frame" id="intro">
    		<h1>Hello World!</h1>
    		<p>intro text</p>
    	</div>
    	<div class="container frame" id="cards">
    		<div class="col-md-4">
    		<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="resources\images\HTML5_logo.svg" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">HTML</h5>
			    <p class="card-text">The foundation of the web</p>
			    <a href="1-HTML/helloworld.html" class="btn btn-primary">HTML Pages</a>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="resources\images\CSS3_logo.svg" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">CSS</h5>
			    <p class="card-text">Making the web beautiful</p>
			    <a href="2-CSS/index.html" class="btn btn-primary">CSS Pages</a>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="resources\images\JavaScript_logo.svg" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">JavaScript</h5>
			    <p class="card-text">Dynamic functionality</p>
			    <a href="3-Javascript/index.html" class="btn btn-primary">Go somewhere</a>
			  </div>
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
    	 Custom Script
    </script>


  </body>
</html>