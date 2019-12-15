<? php

// PHP code to check wether a number is prime or Not 
// function to check the number is Prime or Not 
function primeCheck($number){ 
    if ($number == 1) 
    return 0; 
    for ($i = 2; $i <= $number/2; $i++){ 
        if ($number % $i == 0) 
            return 0; 
    } 
    return 1; 
} 
  
// Driver Code 
$number = $_GET['number']; 
$flag = primeCheck($number); 
if ($flag == 1) 
    echo "Prime"; 
else
    echo "Not Prime"
?> 

?>

<div>
	<p>Is it prime?</p>
	<form>
		<input name="number" type="text">
		<input type="submit" value="go">
	</form>
</div>
