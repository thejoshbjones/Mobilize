<?php
	include("header.html");
	include("objects.php");
	echo "<h1>Hello World!</h1>";
	
	// these are just tests lines
	/*$user = new User("Dillon");
	echo $user->get_firstname();
	$user->set_firstname("Heath");
	echo $user->get_firstname(); */
	User::saveUser();
	
	include("footer.html");
?>