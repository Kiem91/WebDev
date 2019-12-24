<? php

	$error = ""; $success = "";

	if ($_POST){
		if(!$_POST["email"]){
			$error .= "An email address is required.<br>";
		}
		if($_POST["email"] && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			$error .= "Please enter a valid email address.";
		}
		if(!$_POST["subject"]){
			$error .= "A subject is required.<br>";
		}
		if(!$_POST["emailContent"]){
			$error .= "Email content required.<br>";
		}

		if($error != ""){
			$error = '<div class="alert alert-dark" role="alert">'.$error.'</div>';
		}else{

			$emailTo: "michaelrdavis91@gmail.com"
			$subject = $_POST['subject'];
			$content = $_POST['emailContent'];

			$headers = "From: ".$_POST['email'];

			if(mail($emailTo, $subject, $content, $headers)){
				$success = '<div class="alert alert-success" role="alert">Email sent successfully!</div>';
			}else{
				$error = '<div class="alert alert-dark" role="alert">There was a problem sending your message, please try again later.</div>';
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

    <title>PHP Email</title>
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

<h3>Contact us form!</h3>

<div id="errorDiv">
<? echo $error; ?>
<? echo $success; ?>
</div>

 <form id="contactForm" method="post">
  <div class="form-group">
    <label for="email1">Email address</label>
    <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="subject1">Subject</label>
    <input type="text" class="form-control" id="subject1" name="subject">
  </div>
  <div class="form-group">
    <label for="emailContent">What can we help you with?</label>
    <textarea class="form-control" id="emailContent" rows="3" name="emailContent"></textarea>
  </div>
  <button type="submit" id="submit" class="btn btn-primary">Send</button>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript">

    	//Prevents blank fields - returns no errors
    	 $("contactForm").submit(function (e){

    	 	var error = "";

    	 	if($("#email1").val()==""){
    	 		error += "<p>Subject line is blank.</p>";
    	 	}

    	 	if($("#suject1").val()==""){
    	 		error += "<p>Subject line is blank.</p>";
    	 	}

    	 	if($("#emailContent").val()==""){
    	 		error += "<p>Did you mean to send a blank email?</p>";
    	 	}

    	 	if (error != ""){
    	 		$("errorDiv").html('<div class="alert alert-dark" role="alert">'+error+'</div>');
    	 		return false;

    	 	}else{
    	 		return true;
    	 	}


    	 });
    </script>


  </body>
</html>