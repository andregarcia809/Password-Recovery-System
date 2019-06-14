$(document).ready(function() {
	// Get Elements
	var form = $('#form');
	var mainFeedbackEl = $('#main_feedback');
	var nameEl = $('#name');
	var emailEl = $('#email');
	var passwordEl = $('#password');
	var confirmPasswordEl = $('#confirm-password');

	// Check for empty fields
	function emptyFields(formField) {
		if (formField.val() === '') {
			mainFeedbackEl.css('display', 'block');
			return true;
		} else {
			return false;
		}
	}

	// Remove error class on form
	function removeErrorClass() {
		$('input').each(function() {
			if ($('input').hasClass('is-invalid')) {
				return $('input').removeClass('is-invalid');
			}
		});
	}

	// redirects to desire url
	function redirect(page) {
		var baseURL = window.location.origin;
		var pathArray = window.location.pathname.split('/');
		var url = baseURL + '/' + pathArray[1] + '/' + page + '.php';
		return (window.location = url);
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
			mainFeedbackEl.css('display', 'none');
			$.ajax({
				url: 'sign-up-process.php',
				method: 'POST',
				dataType: 'json',
				data: form.serialize()
			})
				.done(function(response) {
					console.log(response);
					// Handle errors
					if (response.error) {
						form.removeClass('was-validated');
						error = response.error;
						switch (error) {
							case 'name':
								removeErrorClass();
								nameEl.addClass('is-invalid');
								$('.name_error').html(response.errorMsg);
								break;
							case 'email':
								removeErrorClass();
								emailEl.addClass('is-invalid');
								$('.email_error').html(response.errorMsg);
								break;
							case 'password':
								removeErrorClass();
								passwordEl.addClass('is-invalid');
								$('.password_error').html(response.errorMsg);
								break;
							case 'password match':
								removeErrorClass();
								confirmPasswordEl.addClass('is-invalid');
								$('.confirm_password_error').html(response.errorMsg);
								break;
							case 'already registered':
								removeErrorClass();
								mainFeedbackEl
									.html(response.registeredMsg)
									.removeClass('invalid-feedback')
									.addClass('invalid-feedback text_medium')
									.css('display', 'block');
								break;
							case 'database':
								removeErrorClass();
								mainFeedbackEl
									.html(response.databaseMsg)
									.removeClass('invalid-feedback')
									.addClass('invalid-feedback text_medium')
									.css('display', 'block');
								break;
							default:
								error = 0;
						}
					} else {
						// No errors
						form[0].reset();
						redirect('dashboard');
					}
				})
				.fail(function(jqXHR) {
					console.log('Request Failed: ' + jqXHR.textStatus);
				});
		}
	});
});
