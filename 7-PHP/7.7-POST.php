<? php

if($_POST){

	$family = array('Larry','Moe','Curly');

	foreach ($family as $value) {
		if($value == $_POST['name']){
			echo "Hello ".$_POST['name'].".";
		}else{
			echo "unknown user."
		}

	}
}

?>

<div>
	<p>Hello, please enter your username</p>
	<form method="post">
		<input name="name" type="text">
		<input type="submit" value="submit">
	</form>
</div>