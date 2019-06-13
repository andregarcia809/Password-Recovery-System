$(document).ready(function() {
	// Get Elements
	var form = $('form');
	var mainFeedBackEl = $('#main_feedback');
	var nameEl = $('#name');
	var emailEl = $('#email');
	var passwordEl = $('#password');
	var confirmPasswordEl = $('#confirm-password');

	// Check for empty fields
	function emptyFields(formField) {
		if (formField.val() === '') {
			mainFeedBackEl.css('display', 'block');
			return true;
		} else {
			return false;
		}
	}

	// Handle form submission
	form.on('submit', function(e) {
		e.preventDefault();
		e.stopPropagation();

		// check for empty Fields
		if (emptyFields(nameEl) || emptyFields(emailEl) || emptyFields(passwordEl) || emptyFields(confirmPasswordEl)) {
			// fail validation
			$(this).addClass('was-validated');
		} else {
			// Validated
			mainFeedBackEl.css('display', 'none');
			$.ajax({
				url: 'sign-up-process.php',
				method: 'POST',
				dataType: 'text',
				data: form.serialize()
			})
				.done(function(response) {
					console.log(response);
					// Handle errors
					if (response.includes('Error')) {
						form.removeClass('was-validated');
						switch (response.includes()) { // Working on implementing a switch statement
							case 'Name':
								nameEl.addClass('is-invalid');
								// $('.name_error').html(response);
								break;
						}
					} else {
						// No errors
						mainFeedBackEl
							.html(response)
							.removeClass('invalid-feedback')
							.addClass('valid-feedback')
							.css('display', 'block');
					}

					// if (response.includes('Name')) {
					//
					//
					// 	$('.name_error').html(response);
					// } else {
					// 	nameEl.removeClass('is-invalid');
					// }

					// if (response.includes('Invalid Email')) {
					// 	form.removeClass('was-validated');
					// 	emailEl.addClass('is-invalid');
					// 	$('.email_error').html(response);
					// } else {
					// 	emailEl.removeClass('is-invalid');
					// }

					// if (response.includes('must contain')) {
					// 	form.removeClass('was-validated');
					// 	passwordEl.addClass('is-invalid');
					// 	$('.password_error').html(response);
					// } else {
					// 	passwordEl.removeClass('is-invalid');
					// }

					// if (response.includes('must match')) {
					// 	form.removeClass('was-validated');
					// 	confirmPasswordEl.addClass('is-invalid');
					// 	$('.password_confirm_error').html(response);
					// } else {
					// 	confirmPasswordEl.removeClass('is-invalid');
					// }
				})
				.fail(function(jqXHR) {
					console.log('Request Failed: ' + jqXHR.textStatus);
				});
		}
	});

	// if (emailEl.val() != '') {
	// 	nameEl.css('border', '1px solid green');
	// 	emailEl.css('border', '1px solid green');
	// 	passwordEl.css('border', '1px solid green');
	// 	con.css('border', '1px solid green');

	// $.ajax({
	// 	url: 'sign-up-process.php',
	// 	method: 'POST',
	// 	dataType: 'json',
	// 	data: {
	// 		form: emailEl.val()
	// 	},
	// 	success: function(response) {
	// 		var feedback = $('#feedback');
	// 		// Email found
	// 		if (response.status === 1) {
	// 			feedback.html(response.msg).css('color', 'green');
	// 			return;
	// 		} else {
	// 			// no email found
	// 			feedback.html(response.msg).css('color', 'red');
	// 		}
	// 		// Check is mail sent
	// 		if (response.status === 101) {
	// 			feedback.html(response.msg).css('color', 'green');
	// 			return;
	// 		} else if (response.status === 503) {
	// 			feedback.html(response.msg).css('color', 'red');
	// 		}
	// 	}
	// });
	// } else {
	// 	emailEl.css('border', '1px solid red');
	// }
});
