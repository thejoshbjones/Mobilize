<?php
	/* Script name:  getMinistry.php
	*  Description:  Gets the requested Ministry from the database and sets session variables to be passed back.
	*/
	session_start();

	if(!empty($_GET['ministry'])) {
		// Clean the ministry variable given in the query string and then set it to a $_SESSION var.
		include("connect.inc");
		$ministry = mysqli_real_escape_string($cxn, $_GET['ministry']);
		$_SESSION['ministry'] = $ministry;
	}
	// If there's nothing in the 'ministry' session var, then go to the welcome page
	if (!empty($_SESSION['ministry'])) {
		
		// Right now, the ministry name must be unique!!
		$query1 = "SELECT ID, Name, Description, City, State FROM ministry WHERE Name='{$_SESSION['ministry']}'";
		$result1 = mysqli_query($cxn, $query1)
			or die ("Couldn't execute query.");
		// If the query doesn't return anything or fails, this will return false
		if (mysqli_num_rows($result1) !== 1) {
			header("Location: errorpage.php");
		} else {
			// Get the ministry data from the query result
			$row1 = mysqli_fetch_assoc($result1);
			extract($row1);
			$_SESSION['minname'] = "$Name";
			$_SESSION['mindesc'] = "$Description";
			$_SESSION['mincity'] = "$City";
			$_SESSION['minstate'] = "$State";
		} 
	} else {
		echo "<div id='error' class='container'>
			<h1 id='heading'>Woops!<p><small>It looks like something went wrong on our end. We'll have it fixed soon as possible!</small></p></h1>
		  </div>";
	}

?>