<?php 
	include("header.html");
	include("nav.html");
	// This page should only be accessible if the user is logged in
	if ($_SESSION['login'] != "yes"){
		header("Location: index.php");
	}
?>
	<script src="js/ministryForm.js"></script>
	
	<div id='main' class='container'>
		
		<h2 class="page-title col-sm-offset-2">New Ministry</h2>
		
		<form id="ministryform" method="POST" action="scripts/saveMinistry.php" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="minMinistryName" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-6">
					<input type="text" name="name" class="form-control" id="minMinistryName" placeholder="Enter Ministry Name">
				</div>
		  	</div>
			
			<div class="form-group">
				<label for="minDescription" class="col-sm-2 control-label">Description</label>
				<div class="col-sm-6">
					<textarea class='input-xxlarge form-control' rows='8' name='description' id='minDescription' maxlength='9000'></textarea>
				</div>
		  	</div>
			
			<div class="form-group">
				<label for="minCity" class="col-sm-2 control-label">City</label>
				<div class="col-sm-6">
					<input type="text" name="city" class="form-control" id="minCity" placeholder="Enter City">
				</div>
		  	</div>
		  	
			<div class="form-group">
				<label for="minState" class="col-sm-2 control-label">State</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="state" id="minState" placeholder="Enter State">
				</div>
		  	</div>
		  	
		  	<div class="form-group">
				<label for="minEmail" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" name="email" id="minEmail" placeholder="Enter Email">
				</div>
		  	</div>
		  	
		  	<div class="form-group">
				<label for="minPhone" class="col-sm-2 control-label">Phone</label>
				<div class="col-sm-6">
					<input type="tel" class="form-control" name="phone" id="minPhone" placeholder="Enter Phone Number">
				</div>
		  	</div>
			
		  	<button type="submit" class="btn btn-primary col-sm-offset-2 last-h">Create Ministry</button>

		</form>
		

<?php 
	include("footer.html");
?>