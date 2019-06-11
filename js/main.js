$(document).ready(function() {
	var emailEl = $('#email');

	$('button').on('click', function() {
		if (emailEl.val() != '') {
            emailEl.css('border', '1px solid green');

            $.ajax({
                url: 'process.php',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    email: emailEl.val()
                },
                success: function(response) {
                    console.log(response);
                }
            });
		} else {
			emailEl.css('border', '1px solid red');
		}
	});
});
