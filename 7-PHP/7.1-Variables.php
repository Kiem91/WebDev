<?php

$name = "Mike";

echo "<p>My name is $name and this page is about PHP variables</p>";

$string1 = "<p>This is the first part";
$string2 = "of a string,";
$string3 = "concatenated in PHP style</p>";

echo $string1." ".$string2." ".$srting3;

$number1 = 54;

$calculation = $number1*31/97+4;

echo "<p>This is a variable called number1, it is equal to: ".$number1.". Using another variable to hold a formula, it looks like: ".$calculation;

$boolean1 = true;
$boolean2 = false;

echo "<p>PHP treats boolean variables somewhat different. Rather than returning 'true' or 'false,' true returns: ".$boolean1." and false returns: ".$boolean2."</p>";

$variableName = "name";

echo "<p>PHP also allows you to nest variable names, such that you can call a variable value with a string of the original variable name. </p>";

echo "<p> $$variableName = 'name' returns: ".$$variableName."</p>"



?>