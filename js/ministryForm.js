/* This is included in the createministry.php file. When the button is clicked, run form verification, 
	and then the php code to add a new ministry to the database, 
	then display a confirmation message when the ajax request is done*/
	
	$(document).ready(function(){
		// options to set up the ajax form
		var options = {
			success: showMessage
		};
		
		// Plug in form validation from jquery.validate and submit the form
		$("#ministryform").validate({
			submitHandler: function(form) {
				// Ajax call that runs the form submission
				$(form).ajaxSubmit(options);
			}
		});
	});
	
	function showMessage(data) {
		if (data == "false") {
			alert("No workie!");
		} else {
			window.location = "ministrycreated.php";
		}
	}
	