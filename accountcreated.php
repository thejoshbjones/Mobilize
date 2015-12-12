<?php
	include("header.html");
	include("nav.html");
	/* This page should not be accessible unless the user has just created an account - the 'newaccount' session variable will only be true
		for the duration of the session that the account was created. Once the user logs in, this page is no longer necessary. */
	if (($_SESSION['login'] == "yes") || ($_SESSION['newaccount'] != "true")) {
		header("Location: index.php");
	}
?>
<div id='main' class='container'>
	<h1>Congratulations, you have successfully created an account!</h1>
<?php
	include("footer.html");
?>