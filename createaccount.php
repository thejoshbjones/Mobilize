<?php 
	include("header.html");
	include("nav.html");
	// This page should not be accessed if the user is logged in
	if ($_SESSION['login'] == "yes"){
		header("Location: index.php");
	}
?>
	
	<script src="js/userForm.js"></script>	
	
	<div id='main' class='container'>
	
		<h2 class="page-title col-sm-offset-2">New Account</h2>
		
		
		<form id="userform" class="form-horizontal" role="form" action='scripts/saveUser.php' method='POST'>
			<div class="form-group">
				<label for="userUsername" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="required form-control" name="un" id="userUsername" placeholder="Enter Username">
				</div>
		  	</div>
			
			<div class="form-group">
				<label for="userInputPassword" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="required form-control" name="pw" id="userInputPassword" placeholder="Enter Password">
				</div>
		  	</div>
		  	
			<div class="form-group">
				<label for="userFirstName" class="col-sm-2 control-label">First Name</label>
				<div class="col-sm-6">
					<input type="text" class="required form-control" name="fn" id="userFirstName" placeholder="Enter First Name">
				</div>
		  	</div>
		  	
		  	<div class="form-group">
				<label for="userLastName" class="col-sm-2 control-label">Last Name</label>
				<div class="col-sm-6">
					<input type="text" class="required form-control" name="ln" id="userLastName" placeholder="Enter Last Name">
				</div>
		  	</div>
		  	
		  	<div class="form-group">
				<label for="userEmail" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-6">
					<input type="email" class="required form-control" name="email" id="userEmail" placeholder="Enter Email">
				</div>
		  	</div>
		  	
		  	<div class="form-group">
				<label for="userPhone" class="col-sm-2 control-label">Phone</label>
				<div class="col-sm-6">
					<input type="tel" class="form-control" name="phone" id="userPhone" placeholder="Enter Phone Number">
				</div>
			</div>
		  	
		  	<div class="form-group">
				<label for="userCity" class="col-sm-2 control-label">City</label>
				<div class="col-sm-6">
					<input type="text" class="required form-control" name="city" id="userCity" placeholder="Enter City">
				</div>
		  	</div>
		  	
		  	<div class="form-group">
				<label for="userState" class="col-sm-2 control-label">State</label>
				<div class="col-sm-6">
					<input type="text" class="required form-control" name="state" id="userState" placeholder="Enter State">
				</div>
		  	</div>
		  	
			
			<div class="form-group">
		  		<label class="control-label col-sm-2">Skills</label>
				<div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
						<label>
							<input name="gd" type="checkbox" id="skillGraphicDesign"> Graphic Design
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="law" type="checkbox" id="skillLaw"> Law
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="bus" type="checkbox" id="skillBusinessMarketing"> Business/Marketing
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="edu" type="checkbox" id="skillEducation"> Education
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="it" type="checkbox" id="skillBusinessIT"> Business/IT
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="min" type="checkbox" id="skillMinistry"> Ministry
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="acct" type="checkbox" id="skillAccounting"> Accounting
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="coun" type="checkbox" id="skillCounseling"> Counseling
						</label>
					</div>
				</div>
			</div>
		  	<button id="btnsubmit" type="submit" class="btn btn-primary col-sm-offset-2 last-h">Create Account</button>
		</form>

<?php 
	include("footer.html");
?>