<?php
    session_start();
	/* Script name:  createMinistry.php
	*  Description:  Receives account info submitted from a form in createministry.php and enters it into a database.
	*/
	
	// Remove notices from php error reporting (this is important for the ajax data response to work)
	error_reporting(E_ALL & ~ E_NOTICE);
	
	// Connect to the MySQL Server (includes connection variable)
	include("connect.inc");
		
	// Clean the data
	foreach($_POST as $field => $value)
	{
		$_POST[$field] = trim($_POST[$field]);
		$_POST[$field] = mysqli_real_escape_string($cxn, $_POST[$field]);
	}
	
	// Get the POST value by the its html name attribute
	$name = $_POST[name];
	$desc = $_POST[description];
	$city = $_POST[city];
	$state = $_POST[state];
	$email = $_POST[email];
	$phone = $_POST[phone];
	
	
	$query = "INSERT INTO ministry 
		(Name, Description, City, State, Email, Phone, Owner)
		VALUES ('$name', '$desc', '$city', '$state', '$email', '$phone', '{$_SESSION[userid]}')";
	$result = mysqli_query($cxn, $query)
		or die ("Couldn't execute query.");
	
	// Set session variable to trigger ministrycreated.php
	$_SESSION['newministry'] = "true";
	// Set the ministry name to be used for the link in the confirmation message.
	$_SESSION['minname'] = $name;
?>