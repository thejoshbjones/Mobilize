<?php
// Connect to the MySQL Server.
// THIS WILL NEED TO BE CHANGED FOR PRODUCTION!
	$host="localhost";
	$user="root";
	$passwd="";
	$dbname = "joshua_hackattack";
	$cxn = mysqli_connect($host, $user, $passwd, $dbname) 
		or die ("Could not connect to the MySQL Server");
?>