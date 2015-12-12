<?php
	include("header.html");
	include("nav.html");
	/* This page should not be accessible unless the user has just created a ministry page - the 'newministry' session variable will only be true
		for the duration of the session that the account was created. Once the user logs in, this page is no longer necessary. */
	if (($_SESSION['login'] != "yes") || ($_SESSION['newministry'] != "true")) {
		header("Location: index.php");
	} else {
		$minname = $_SESSION['minname'];
		echo "
			<div id='main' class='container'>
				<h1>Congratulations, you have successfully created a ministry page!<br><small><a href='http://localhost/c4k/ministry.php?ministry=$minname'>Click here to view it.</a></small></h1>
		";
	}
	
	include("footer.html");
?>
