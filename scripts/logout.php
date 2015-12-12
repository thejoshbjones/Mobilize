<?php
	// This logs the user out by ending the session and redirects to the home page
	session_start();
	session_destroy();

	header("Location: ../index.php");
?>