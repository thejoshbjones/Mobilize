<?php
	include("header.html");
	include("nav.html");
	/* This page should currently not be accessible unless a user is logged in because it depends on data from that user.
		Also, if there's not username, direct to the error page because that is relied upon as well.*/
	if ($_SESSION['login'] != "yes") {
		header("Location: index.php");
	} else if (!$_SESSION['username']) {
		header("Location: errorpage.php");
	}
?>

<div class="container">

<?php
	/* Script name:  findMinistries.php
	*  Description:  Receives input from findMinistriesForm.html, and searches the database for ministries matching the criteria, 
					 and returns the results to be displayed on searchMinistries.php
	*/
	session_start();
	
	// Connect to the MySQL Server (includes connection variable)
	include("connect.inc");
	
	// Clean each variable given in the query string and then set it to a variable.
	foreach($_POST as $field => $value)
	{
		// for each $_GET[x] variable, x = the value of the html name property of the form element
		$_POST[$field] = trim(htmlspecialchars($_POST[$field]));
		$_POST[$field] = mysqli_real_escape_string($cxn, $_POST[$field]);
		
		// Set each value received in the query string to its own session var named by the html name property
		$_SESSION["$field"] = $_POST[$field];
	}
	
	
	if ($_SESSION["searchcity"]) {
		$city = $_SESSION["searchcity"];
		// echo "<div><h3>City: </h3>$city</div>";
	}
	
	if ($_SESSION["searchstate"]) {
		$state = $_SESSION["searchstate"];
		// echo "<div><h3>State: </h3>$state</div>";
	}
	
	
	$query1 = "SELECT Name, City, State, Description FROM ministry WHERE City='$city' AND State='$state'";
	$result1 = mysqli_query($cxn, $query1)
			or die ("Couldn't execute query.");
	//$query1 = "SELECT City, State FROM user WHERE username='{$_SESSION['username']}'";
	//$result1 = mysqli_query($cxn, $query1)
	//	or die ("Couldn't execute query."); 
	
	if ($result1) {		
		$nrows = mysqli_num_rows($result1);	  
		if ($nrows > 0) {
			echo "<h1 class='page-title'>Ministries in $city, $state</h1>";
			echo "<table class='table table-hover'>
				  <thead>
					  <tr>
						<th>Name</th>
						<th>Description</th>
					  </tr>
				  </thead>
				  <tbody>
					  ";
			for ($i=0; $i<$nrows; $i++)
			{
				$row1 = mysqli_fetch_assoc($result1);
				extract($row1);
				
				echo "<tr>
						<td><a href='http://localhost/c4k/ministry.php?ministry=$Name'>$Name</a></td>
						<td>$Description</td>
					  </tr>";
			}
		
			echo "</tbody></table>";
		} else {
			echo "<div id='error' class='container'>
			<h1 id='heading'>Sorry!<p><small>It looks like there were no ministries found that match your search.</small></p></h1>
		  </div>";
		}
	} else {
		echo "<div id='error' class='container'>
			<h1 id='heading'>Woops!<p><small>It looks like something went wrong on our end. We'll have it fixed soon as possible!</small></p></h1>
		  </div>";
	}
	
	echo "<div id='error' class='container'>
			<a href='http://localhost/c4k/searchMinistries.php' class='btn btn-primary btn-sm' role='button'>Search Again</a>
		  </div>";
	
	include("footer.html");
?>