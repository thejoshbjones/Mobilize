<?php 
	include("header.html");
	include("nav.html");
?>

	  <!-- login form -->
		<?php
			// Display the login or logout forms based on whether a user is currently logged in
			if ($_SESSION['login'] == "yes"){
				echo "<form id='logoutform' action='scripts/logout.php' class='navbar-form pull-right' method='GET'>
						  <ul class='nav disabled'><li class='disabled'><a>Logged in as {$_SESSION['username']}</a></li></ul>
						  <button name='logout-button' id='logoutSubmit' type='submit' class='btn'>Logout</button>
					  </form>";
			} else {
				echo "<form id='loginform' action='scripts/login.php' class='navbar-form pull-right' method='POST'>
						<input type='text' class='input-small required' name='username' placeholder='User Name'>
						<input type='password' class='input-small required' name='password' placeholder='Password'>
						<button id='loginSubmit' type='submit' class='btn'>Login</button>
					  </form>";
			}
		?>
	
	
	<div id='main' class='container'>
		
		<!-- 
		
		<h2 class='page-title col-sm-offset-2'>Welcome to Project Name</h2>
		<form class='form-horizontal' role='form' id='loginform' action='scripts/login.php' method='POST'>
			<div class='form-group'>
				<label for='logUsername' class='col-sm-2 control-label'>Username</label>
				<div class='col-sm-6'>
					<input type='text' class='form-control' id='logUsername' name='username' placeholder='Username'>
				</div>
			</div>
			<div class='form-group'>
				<label for='logPassword' class='col-sm-2 control-label'>Password</label>
				<div class='col-sm-6'>
					<input type='text' class='form-control' id='logPassword' name='password' placeholder='Password'>
				</div>
			</div>
			<button type='submit' name='login-button' class='btn btn-primary col-sm-offset-2 last-h'>Sign In</button>
		</form> 
		
		-->
		
		
<?php 
	include("footer.html");
?>