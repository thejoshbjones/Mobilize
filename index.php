<?php 
	include("header.html");
	include("nav.html");
?>
	
	<div id='main' class='container'>
<?php
	if ($_SESSION['login'] == "yes") {
		echo "
			<h2 class='page-title'>Welcome back!</h2>
			<p class='lead'>What would you like to do?</p>
			
			<form action='createministry.php'>
			<button class='btn btn-lg'  >Create a Ministry</button>
			</form>
			<br>
			<form action='searchMinistries.php'>
			<button class='btn btn-lg'  >Search for a Ministry</button>
			</form>
		";
	} else {
		echo "
			<h2 class='page-title'>Welcome to Project Panda</h2>
			<p class='lead'>Click \"Create an account\" to get started and then make a page for your ministry or find volunteer opportunities in your area!</p>
		
			<form action='createaccount.php'>
			<button class='btn btn-lg'  >Create an Account</button>
			</form>
		";
	}

	include("footer.html");
?>