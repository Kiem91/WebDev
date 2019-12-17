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

if (is_numeric($number) && $number>0 && $number==round($number,0)) {
	if ($flag == 1) {
		echo "<p>".$number." is Prime!</p>"; 
	}else{
		echo "<p>".$number." is not Prime!</p>"; 
	}
    
}else{
	echo "<p>Please enter a positive, whole numeric digit.</p>";
}

?> 

<div>
	<p>Is it prime?</p>
	<form>
		<input name="number" type="text">
		<input type="submit" value="go">
	</form>
</div>
