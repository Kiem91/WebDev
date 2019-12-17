<? php

$emailTo = "michaelrdavis91@gmail.com";

$subject = "test";

$body = "test1";

$headers = "From: michaelrdavis91@gmail.com";

if(mail($emailTo, $subject, $body, $headers)){
	echo "success!!";
}else{
	echo "failure!!!";
}


?>