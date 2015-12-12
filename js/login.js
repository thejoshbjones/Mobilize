/* This script handles the login form validation */

/* When the button is clicked, run form verification, then display a confirmation message when the ajax request is done */
$(document).ready(function(){
	// options to set up the ajax form
		var options = {
			success: showPage,
		};

	// Plug in form validation from jquery.validate and submit the form
	$("#loginform").validate({
		submitHandler: function(form) {
			// The ajax call that runs the form submission
			//form.submit();
			$(form).ajaxSubmit(options);
		},
		invalidHandler: function(event, validator) {
			alert("Either the Username or the Password field is empty, idiot.");
		},
		showErrors: function(errorMap, errorList) {
		   /* This is custom error-handling code. There's nothing here because
		   I'm using invalidHandler to display my own message instead of the jquery.validate ones. */
		},
	});
});

function showPage(data) {
	if (data == "false") {
		alert("The username and/or password you entered is incorrect or does not match. Try again.");
	} else {
		window.location = window.location.pathname;
	}
}