<?php
    /* Script name:  saveOpportunity.php
	*  Description:  Receives account info submitted from a form in createOpportunity.php and enters it into a database.
	*/
	
	// Remove notices from php error reporting (this is important for the ajax data response to work)
	error_reporting(E_ALL & ~ E_NOTICE);
	
	// Connect to the MySQL Server (includes connection variable)
	include("..\includes\connect.inc");
		
	// Clean the data
	foreach($_POST as $field => $value)
	{
		$_POST[$field] = trim($_POST[$field]);
		$_POST[$field] = mysqli_real_escape_string($cxn, $_POST[$field]);
	}
	
	$query1 = "SELECT ID FROM ministry WHERE Name='{$_SESSION['minname']}'";
	$result1 = mysqli_query($cxn, $query1)
		or die ("Couldn't execute query.");
	$row1 = mysqli_fetch_assoc($result1);
	extract($row1);
	
	// Get the POST value by the its html name attribute or set the fields by session vars
	$title = $_POST[title];	
	$owner = $_SESSION['userid'];
	$ministry = "$ID";
	$description = $_POST[desc];
	$timeframe = $_POST[timeframe];
	$status = '1';
	$address = $_POST[address];
	$city = $_POST[city];
	$state = $_POST[state];
	$zip = $_POST[zip];
	$gd = $_POST[gd];	
	$law = $_POST[law];
	$bus = $_POST[bus];
	$edu = $_POST[edu];
	$it = $_POST[it];
	$min = $_POST[min];
	$acct = $_POST[acct];
	$coun = $_POST[coun];
	
	$query1 = "INSERT INTO opportunity 
		(Title, Ministry, Owner, Description, Timeframe, Status, Address, City, State, Zip)
		VALUES ('$title', '$ministry', '$owner', '$description', '$timeframe', '$status', '$address', ' $city', '$state', '$zip')";
	$result1 = mysqli_query($cxn, $query1)
		or die ("Couldn't execute query.");
	
	// Get the id of the row just inserted
	$lastID = mysqli_insert_id($cxn);
	
	// initialize the array to save the name of the skills
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
	// This needs work, it is not yet functioning properly
	foreach ($checkedArray as &$value) {
		$query2 = "SELECT ID FROM skills 
					WHERE skills.Skill='$value'";
		$result2 = mysqli_query($cxn, $query2)
			or die ("Couldn't execute query.");
		
		$row2 = mysqli_fetch_assoc($result2);
		if ($row2) {
			extract($row2);
			$skillid = "$ID";
			// echo $skillid; for testing purposes
		}
	// echo $lastID; for testing purposes
		$query3 = "UPDATE `opportunity` 
			SET `Skill` = '$skillid' 
			WHERE ID ='$lastID'"; 
		$result3 = mysqli_query($cxn, $query3)
			or die ("Couldn't execute query.");		
	}
?>