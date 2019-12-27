<? php

	$exists = "";
	$weather = "";

	if(array_key_exists('city', $_GET)){

		$city = str_replace(' ', '-', $_GET['city']);

		$file_headers = @get_headers("http://completewebdevelopercourse.com/locations/".$city);
		if ($file_headers[0]=='HTTP/1.1 404 not found') {
			$error = "Unable to obtain data on location requested."
		}else{

			$forcastPage = file_get_contents("http://completewebdevelopercourse.com/locations/".$city);

			$pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forcastPage);

			if (sizeof ($pageArray) > 1) {
			
					$pageArray2 = explode(</span></span></span>, $pageArray);

				if (sizeof ($pageArray2) > 1) {

					$weather = $pageArray2[0];

				} else {

					$error = "Unable to obtain data on location requested."

				}

			

			}else{

				$error = "Unable to obtain data on location requested."

			}

		}
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

    <style type="text/css">
    	html { 
		  background: url(..\resources\images\weatherBackground.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		body{
			background: none;
		}
		.container{
			text-align: center;
			width: 500px;
		}
		input{
			margin: 20px 0;
		}
		#weatherReport{
			margin: 15px 0;
		}
    </style>

    <title>7.9 - Weather Scraper</title>
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


    <div class="container">

    	<h1>What's the Weather?</h1>

    	<p></p>

    	<form>
		  <div class="form-group">
		    <label for="search">Enter the name of a city:</label>
		    <input type="text" class="form-control form-control-lg" id="search" placeholder="London" name="search" value="<? php if (array_key_exists('city', $_GET){ echo $_GET['city'];}); ?>">
		    
		  	<button type="submit" class="btn btn-primary">Submit</button>
		  </div>
		</form>

		<div id="weatherReport">

			<?php 
				if(($weather !== "")&&($error == "")){
					echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
				}else if ($error !== "") {
					echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
				}
				
			?>

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