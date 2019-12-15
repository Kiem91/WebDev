<?php

$myArray = array("Larry", "Moe", "Curly");

echo "<p>Arrays in PHP cannot be returned using the echo command, but must be read back using print_r. A short array follows: </p>"

print_r($myArray);

echo "<p>However, echo can return items from an array if the index is specified: $myArray[1] is: ".$myArray[1]."</p>";

echo "<p>Arrays in PHP are called associative arrays, and in this the index value of the array does not have to be the next number in the sequence or a number at all. See below: ";

$crazyArray = array("Larry", "Moe", "Curly");

$crazyArray[5] = "Potato Salad";

$crazyArray["PineapplePizza"] = "Best Pizza";

print_r($crazyArray);

?>