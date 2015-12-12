<?php
	// This is needed because notices mess with the data returned to ajax when this is called.
	error_reporting(E_ALL & ~ E_NOTICE);
	
	session_start();
	/* Script name:  login.php
	   Description:  Takes the data submitted from the login form, and matches it to the database.
			If there is a matching username and password, login that user.*/
	
	// Connect to the MySQL Server (includes connection variable)
	include("connect.inc");
	
	// Assign the received form data to variables. They are encoded to match the data in the db
	$username = mysqli_real_escape_string($cxn, $_POST[username]);
		
	// query to get all the rows where the username matches the given $username
	$query1 = "SELECT ID, username, password FROM user WHERE username='$username'";
	$result = mysqli_query($cxn, $query1)
		or die ("Couldn't execute query.");
		
	// Get the results from the query above 
	$row = mysqli_fetch_assoc($result);
	
	if ($row){
		// If the given username is found, compare the password
		extract($row);
		$password = "$password";
		$userid = "$ID";
				
		// If the password matches the encrypted password stored in the db, login the user.
		if ($password == mysqli_real_escape_string($cxn, $_POST[password])) {
			// This means that the user is "logged in".
			$_SESSION['login'] = "yes";
			$_SESSION['username'] = "$username";
			$_SESSION['userid'] = "$userid";
		} else {
			$_SESSION['login'] = "no";
			// Give the "false" back to the ajax response
			echo "false";
		} 
	} else {
		$_SESSION['login'] = "no";
		// Give the "false" back to the ajax response
		echo "false";
	} 
?>