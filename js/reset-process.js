$(document).ready(function() {
	var emailEl = $('#email');

	$('button').on('click', function() {
		if (emailEl.val() != '') {
			emailEl.css('border', '1px solid green');

			$.ajax({
				url: 'reset-process.php',
				method: 'POST',
				dataType: 'json',
				data: {
					email: emailEl.val()
				},
				success: function(response) {
					var feedback = $('#feedback');
					// Email found
					if (response.status === 1) {
						feedback.html(response.msg).css('color', 'green');
						return;
					} else {
						// no email found
						feedback.html(response.msg).css('color', 'red');
					}
					// Check is mail sent
					if (response.status === 101) {
						feedback.html(response.msg).css('color', 'green');
						return;
					} else if (response.status === 503) {
						feedback.html(response.msg).css('color', 'red');
					}
				}
			});
		} else {
			emailEl.css('border', '1px solid red');
		}
	});
});
