<?php
	/* Script name:  getOpportunities.php
	*  Description:  Gets the Opportunities for a given Ministry from the database and sets session variables to be passed back.
	*/
	session_start();
	
	// This script should only be run if there has been a ministry passed to it.
	if(!empty($_GET['ministry'])) {
		// Clean the ministry variable given in the query string and then set it to a $_SESSION var.
		include("connect.inc");
		$ministry = mysqli_real_escape_string($cxn, $_GET['ministry']);
		$_SESSION['ministry'] = $ministry;
	}
	// If there's nothing in the 'ministry' session var, then go to the welcome page
	if (!empty($_SESSION['ministry'])) {
		
		// Right now, the ministry name must be unique!!
		$query1 = "SELECT ID FROM ministry WHERE Name='{$_SESSION['ministry']}'";
		$result1 = mysqli_query($cxn, $query1)
			or die ("Couldn't execute query.");
		// If the query doesn't return anything or fails, this will return false
		if (mysqli_num_rows($result1) !== 1) {
			echo "<div id='nopage' class='container'>
			<h1 id='heading'>Woops!<p><small>It looks like either the page you are trying to access doesn't exist or we made a mistake. Please check the URL and try again.</a>
			</small></p></h1>
			</div>";
		} else {
			// Get the ministry data from the query result
			$row1 = mysqli_fetch_assoc($result1);
			extract($row1);
			
			$_SESSION['ministryid'] = "$ID";
			
			$query2 = "SELECT * FROM opportunity WHERE Ministry='{$_SESSION['ministryid']}'";
			$result2 = mysqli_query($cxn, $query2)
				or die ("Couldn't execute query.");
			// If the query doesn't return anything or fails, this will set the "noops" session var to "true"
			if (!$result2) {
				$_SESSION['noopps'] = "true";
			} else {
				$opportunitiesArray = array();
				// This iterates over each row returned in the result and puts it into an multidimensional array.
				while ($row2 = mysqli_fetch_assoc($result2)) {
					// Run another query to get the skill name from the skill id
					extract($row2);
					$query3 = "SELECT Skill FROM skills WHERE ID='$Skill'";
					$result3 = mysqli_query($cxn, $query3)
						or die ("Couldn't execute query");
					$rowskill = mysqli_fetch_assoc($result3);
					
					$opportunityArray = array($row2['Title'], $row2['Description'], $rowskill['Skill'], $row2['Timeframe']);
					array_push($opportunitiesArray, $opportunityArray);
				}
				// Set the opportunities array to a Session var to be used in ministry.php
				$_SESSION['opportunities'] = $opportunitiesArray;
				// Set get the number of rows to iterate over to display the right opportunity data
				$_SESSION['numrows'] = mysqli_num_rows($result2);
			}
		} 
	} else {
		echo "<div id='error' class='container'>
			<h1 id='heading'>Woops!<p><small>It looks like something went wrong on our end. We'll have it fixed soon as possible!</small></p></h1>
		  </div>";
	}
?>