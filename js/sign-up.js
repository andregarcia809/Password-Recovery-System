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
							case 'wrong password':
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

	// Login
	$('#loginBtn').on('click', function() {
		var loginForm = $('#login-form');
		var loginEmailEl = $('#loginEmail');
		var loginPasswordEl = $('#loginPassword');

		// check for empty Fields
		if (emptyFields(loginEmailEl) || emptyFields(loginPasswordEl)) {
			// fail validation
			loginForm.addClass('was-validated');
		} else {
			// validated
			$.ajax({
				url: 'login-process.php',
				method: 'POST',
				dataType: 'json',
				data: loginForm.serialize()
			})
				.done(function(response) {
					console.log(response);
					// Handle errors
					if (response.error) {
						form.removeClass('was-validated');
						error = response.error;
						switch (error) {
							case 'email error':
								removeErrorClass();
								loginEmailEl.addClass('is-invalid');
								$('.email_error').html(response.errorMsg);
								break;
							case 'email not found':
								removeErrorClass();
								mainFeedbackEl
									.html(response.loginMsg)
									.removeClass('invalid-feedback')
									.addClass('invalid-feedback text_medium')
									.css('display', 'block');
							case 'wrong password':
								removeErrorClass();
								mainFeedbackEl
									.html(response.loginMsg)
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
						loginForm[0].reset();
						redirect('dashboard');
					}
				})
				.fail(function(jqXHR) {
					console.log('Request Failed: ' + jqXHR.textStatus);
				});
		}
	});

	// Searcher
	$('#searchBtn').on('click', function() {
		var searchForm = $('#searchForm');
		var queryEl = $('#query');

		// check for empty Fields
		if (emptyFields(queryEl)) {
			// fail validation
			searchForm.addClass('was-validated');
		} else {
			// validated
			$.ajax({
				url: 'search-process.php',
				method: 'POST',
				dataType: 'json',
				data: searchForm.serialize()
			})
				.done(function(response) {
					console.log(response);
					// Handle errors
					if (response.error) {
						form.removeClass('was-validated');
						error = response.error;
						switch (error) {
							case 'empty':
								removeErrorClass();
								mainFeedbackEl.addClass('text_medium').css('display', 'block');
								break;
							case 'colleagues not found':
								removeErrorClass();
								mainFeedbackEl
									.html(response.errorMsg)
									.addClass('text_medium')
									.css('display', 'block');
								break;
							default:
								error = 0;
						}
					} else {
						// No errors
						searchForm[0].reset();
						$.each(response, function() {
							console.log(response[1].lastName);
							// mainFeedbackEl
							// 	.html(key)
							// 	.addClass('text_medium')
							// 	.css('display', 'block');
						});
					}
				})
				.fail(function(jqXHR) {
					console.log('Request Failed: ' + jqXHR.textStatus);
				});
		}
	});
});
