<?php 
	include("header.html");
	include("nav.html");
	/*This page is only accessible if the user is logged in and is an admin of the current ministry page.
		The code to set this owner flag is not written yet.*/
	if (($_SESSION['login'] != "yes") || ($_SESSION['minadmin'] != "true")) {
		header("Location: index.php");
	}
?>
	
	<div id='main' class='container'>
		
		
		<h2 class="page-title col-sm-offset-2">New Opportunity</h2>
		
		<form id="opportunityform" class="form-horizontal" role="form" action="scripts\saveOpportunity.php" method="POST">
			<div class="form-group">
				<label for="oppTitle" class="control-label col-sm-2">Title</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="title" id="oppTitle" placeholder="Enter Title">
				</div>
		  	</div>
			
			<div class="form-group">
				<label for="oppDescription" class="control-label col-sm-2">Description</label>
				<div class="col-sm-6">
					<textarea class="form-control" name="desc" id="oppDescription" rows="3"></textarea>
				</div>
		  	</div>
		  	
		  	<div class="form-group">
		  		<label class="control-label col-sm-2">Skills Needed</label>
				<div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
						<label>
							<input name="gd" type="checkbox" id="skillGraphicDesign" value="graphic design"> Graphic Design
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="law" type="checkbox" id="skillLaw" value="law"> Law
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="bus" type="checkbox" id="skillBusinessMarketing" value="business marketing"> Business/Marketing
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="edu" type="checkbox" id="skillEducation" value="education"> Education
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="it" type="checkbox" id="skillBusinessIT" value="business it"> Business/IT
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="min" type="checkbox" id="skillMinistry" value="ministry"> Ministry
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="acct" type="checkbox" id="skillAccounting" value="accounting"> Accounting
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="coun" type="checkbox" id="skillCounseling" value="counseling"> Counseling
						</label>
					</div>					
				</div>
			</div>
		  	
		  	
		  	
			<div class="form-group">
				<label for="oppTimeframe" class="control-label col-sm-2">Timeframe</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="timeframe" id="oppTimeframe" placeholder="Enter Timeframe">
				</div>
		  	</div>
		  	
		  	<div class="form-group">
				<label for="oppAddress" class="control-label col-sm-2">Address</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="address" id="oppAddress" placeholder="Enter Address">
				</div>
		  	</div>
		  	
		  	<div class="form-group">
				<label for="oppCity" class="control-label col-sm-2">City</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="city" id="oppCity" placeholder="Enter City">
				</div>
		  	</div>
		  	
		  	<div class="form-group">
				<label for="oppState" class="control-label col-sm-2">State</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="state" id="oppState" placeholder="Enter State">
				</div>
		  	</div>
		  	
		  	<div class="form-group">
				<label for="oppZip" class="control-label col-sm-2">Zip</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="zip" id="oppZip" placeholder="Enter Zip">
				</div>
		  	</div>
		  	
		  	<button type="submit" class="btn btn-primary col-sm-offset-2 last-h">Create Opportunity</button>
		</form>
		

<?php 
	include("footer.html");
?>