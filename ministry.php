<?php
	include("header.html");
	include("nav.html");
	
	if (!$_GET['ministry']) {
		header("Location: index.php");
	}
	
	include("scripts/getMinistry.php");
	include("scripts/getOpportunities.php");
?>
	
	<div id='main' class='container'>
	
		<div class="row">
			<div class="xs-col-12">
				<img src="img/def-img.png" alt="image" class="img-responsive first-flush">
			</div>
		</div>
		
		<h1 class="page-title">
		<?php
			if ($_SESSION['minname']) {
				echo $_SESSION['minname'];
			}
		?>
		</h1>
		<h4 class="text-muted">
		<?php
			if ($_SESSION['mincity'] && $_SESSION['minstate']) {
				echo $_SESSION['mincity'] . ", " . $_SESSION['minstate'];
			}
		?>
		</h4>
		<p class="lead" id="minDescription">
		<?php
			if ($_SESSION['mindesc']) {
				echo $_SESSION['mindesc'];
			}
		?>
		</p>		
		<br/>
		<?php
			/* Compare the user id to the owner field of the ministry to see if the user is an owner.
				If so, give them the option of adding an opportunity.*/
			$query1 = "SELECT Owner FROM ministry WHERE Owner='{$_SESSION['userid']}' AND Name='{$_SESSION['minname']}'";
			$result1 = mysqli_query($cxn, $query1)
				or die ("Couldn't execute query.");
			if (mysqli_num_rows($result1) == 1) {
				echo "
					<form action='createopportunity.php'>
					<button class='btn btn-lg'  >Add an Opportunity</button>
					</form><br>
				";
				// Set this session to allow the admin to access the create opportunity page
				$_SESSION['minadmin'] = "true";
			}
		?>
		<h4>Available Opportunities</h4>
		<hr/>
		<table class='table table-hover'>
		<?php
			if ($_SESSION['numrows'] > 0) {
				echo "
					<thead>
						<tr>
							<th>Title</th>
							<th>Description</th>
							<th>Skill Needed</th>
							<th>Time Needed</th>
						</tr>
					</thead>
					<tbody>
				";
				for ($i=0; $i < $_SESSION['numrows']; $i++) {
						// The opportunties array is set in getOpportunties.php
						echo "
							<tr>
								<td>{$_SESSION['opportunities'][$i][0]}</td>
								<td>{$_SESSION['opportunities'][$i][1]}</td>
								<td>{$_SESSION['opportunities'][$i][2]}</td>
								<td>{$_SESSION['opportunities'][$i][3]}</td>
							</tr>
						";
					}
				echo "
					</tbody>
						<tr>
					
				";
			} else {
				echo "
					<tr>There are currently no available opportunities.</tr>
				";
			}
		?>
		</table>
<?php 
	include("footer.html");
?>