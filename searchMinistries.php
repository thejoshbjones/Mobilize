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
	/* This is the form to enter criteria to search for ministries, once this form is submitted, 
		the user will be directed to the showMinistries.php page */
	
	include("findMinistriesForm.html");
	
	include("footer.html");
?>