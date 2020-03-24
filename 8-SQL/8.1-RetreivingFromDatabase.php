<? php

	$link = mysqli_connect("shareddb-r.hosting.stackcp.net", "UsersTemp-313233cb1c", "qgmv0cxycc", "UsersTemp-313233cb1c");

	if(mysqli_connect_error()){
		die ("Failed to connect to database");

	}else{
		echo "Database connection sucessful, loading users...";
	}


	//getting user data

	$getQuery = "SELECT * FROM users";

	if ($result = mysqli_query($link, $getQuery)){
		while($row = mysqli_fetch_array($result)){
			echo "Your email is".$row['email']."and your password is: ".$row['password'];
			print_r($row);
		}
	}


	//adding user data
	$insertQuery = "INSERT INTO `users` (`email`, `password`) VALUES ('larry@domail.com', 'abc123')";

	mysqli_query($link, $insertQuery);
?>