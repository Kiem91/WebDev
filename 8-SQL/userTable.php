<?php
	session_start();
	include '..\config.php';
?>
<html>
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
		<div class="container">
			<table id="usertable" class="table">
				<thead>
					<tr>
						<th scope="col">ID #</th>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Username</th>
						<th scope="col">Date Joined</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$sql = "SELECT * FROM `Users`";
					$result = mysqli_query($db, $sql);
					$resultCheck = mysqli_num_rows($result);

					if ($resultCheck>0) {
						while ($row = mysqli_fetch_array($result)) { 
						    echo "<tr>
						        <td>" . $row[0] . "</td>
						        <td>" . $row[1] . "</td>
						        <td>" . $row[2] . "</td>
						        <td>" . $row[3] . "</td>
						        <td>" . $row[5] . "</td>
						      </tr>";
					};
				}
				?>
				</tbody>
			</table>
		</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		
	</body>
</html>