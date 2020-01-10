  <?php  
 //fetch.php
 include(config.php);
 
if(isset($_POST["email"]))  
{
	$query = "SELECT * FROM `Users` WHERE `email` = '".$_POST["email"]."'";  
	$result = mysqli_query($connect, $query);  
	$row = mysqli_fetch_array($result);  
	echo json_encode($row);  
 }  
 ?>