<?php
    /* Script name:  saveUser.php
	*  Description:  Receives account info submitted from a form in createaccount.php and enters it into a database.
	*/

	session_start();
	
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
	$username = $_POST[un];
	$password = $_POST[pw];
	$firstname = $_POST[fn];
	$lastname = $_POST[ln];
	$email = $_POST[email];
	$phone = $_POST[phone];
	$city = $_POST[city];
	$state = $_POST[state];
	$gd = $_POST[gd];
	$law = $_POST[law];
	$bus = $_POST[bus];
	$edu = $_POST[edu];
	$it = $_POST[it];
	$min = $_POST[min];
	$acct = $_POST[acct];
	$coun = $_POST[coun];
	
	$query1 = "INSERT INTO user 
		(username, password, First_Name, Last_Name, City, State, Email, Phone)
		VALUES ('$username', '$password', '$firstname', '$lastname', '$city', '$state', '$email', '$phone')";
	$result1 = mysqli_query($cxn, $query1)
		or die ("Couldn't execute query.");
		
	if ($result1) {
		// Set the 'new account' session for accountcreated.php
		$_SESSION['newaccount'] = "true";
	}
	
	// Get the user id from the query result
	$userid = mysqli_insert_id($cxn);
	echo "user id: " . $userid . "<br>";
	
	$checkedArray = array();
	
	if ($gd) {
		array_push($checkedArray, "Graphic Design");
		echo "Graphic Design<br>";
	}
	if ($law) {
		array_push($checkedArray, "Law");
		echo "Law<br>";
	}
	if ($bus) {
		array_push($checkedArray, "Business/Marketing");
		echo "Business/Marketing<br>";
	}
	if ($edu) {
		array_push($checkedArray, "Education");
		echo "Education<br>";
	}
	if ($it) {
		array_push($checkedArray, "Computing/IT");
		echo "Computing/IT<br>";
	}
	if ($min) {
		array_push($checkedArray, "Ministry");
		echo "Ministry<br>";
	}
	if ($acct) {
		array_push($checkedArray, "Accounting");
		echo "Accounting<br>";
	}
	if ($coun) {
		array_push($checkedArray, "Counseling");
		echo "Counseling<br>";
	}
	
	foreach ($checkedArray as &$value) {
		$query2 = "SELECT ID FROM skills 
					WHERE skills.Skill='$value'";
		$result2 = mysqli_query($cxn, $query2)
			or die ("Couldn't execute query.");
		
		$row2 = mysqli_fetch_assoc($result2);
		if ($row2) {
			extract($row2);
			$skillid = "$ID";
			echo $skillid;
		}
				
		$query3 = "INSERT INTO userskills
			(Users, Skills)
			VALUES ('$userid', '$skillid')";
		$result3 = mysqli_query($cxn, $query3)
			or die ("Couldn't execute query.");
	}
?>