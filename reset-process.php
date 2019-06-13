<?php
	// require Database
	require_once 'db.php';
	require_once 'functions.php';

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	// Load Composer's autoloader
	require 'vendor/autoload.php';

	// Mail function
	function sendMail($email, $token) {
		try {
			// Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer(true);

			//Server settings
			// $mail->SMTPDebug = 2;                                           // Enable verbose debug output
			$mail->isSMTP();                                                // Set ma use SMTP
			$mail->Host       = 'smtp.gmail.com';                           // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                       // Enable SMTP authentication
			$mail->Username   = 'andresgarcia2430@gmail.com';               // SMTP username
			$mail->Password   = 'drenic0424';                              // SMTP password
			$mail->SMTPSecure = 'ssl';    //tls                             // Enable TLS encryption, `ssl` also accepted
			$mail->Port       = 465;  //587                                 // TCP  con

			//Recipients (To who is being sent)
			$mail->setFrom('ForgotPasswordSystem@gmail.com', 'Forgot Password System');
			$mail->addAddress('andres.garcia@tintworld.com');     // Add a recipient
			// $mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo('noreply@forgotpasswordsystem.com', 'No Reply');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			// Content
			$subject = 'Password Recovery';
			$body = "
				Hi, <br><br>
				In order to reset your password, please click on the link below: <br>
				<a href='http://devbox.com/forgotPasswordSystem/reset-password.php?email=$email&token=$token'>
					http://devbox.com/forgotPasswordSystem/reset-password.php?email=$email&token=$token
				</a> <br><br>
				Kind Regards, <br>
				Andres G.
			";
			$mail->isHTML(true);                                  // Set email fo HTML
			$mail->Subject = $subject;
			$mail->Body    = $body;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		 	// Send mail
			if ($mail->send()) {
					exit(json_encode(
						array(
							'status' => 1,
							'msg' => 'An email has been sent to reset your password.'.'<br>'. 'Please check your inbox.'
						)
					));
			} else {

				// Send mail Error
			}exit(json_encode(
				array(
					'status' => 101,
					'msg' => "Mail could not be sent. Mailer Error: {$mail->ErrorInfo}"
				)
			));
		 } catch (Exception $e) {
			exit(json_encode(
				array(
					'status' => 503,
					'msg' => "Mail could not be sent. Mailer Error: {$e->getMessage()}"
				)
			));
		}
	}

	// Check if mail has been submitted
	if (isset($_POST['email'])) {
		// Get email
		$email = $_POST['email'];

		// Select user from database that matches email
		$sql = 'SELECT id FROM users WHERE email = :email';
		$stmt = $pdo->prepare($sql);
		$stmt->execute(['email' => $email]);
		$userInfo =  $stmt->fetch();

		// Verify Email existence
		if ($userInfo) {
			// Generate Token
			$token = generateNewString();

			// Update Database with token and token expiration time
			$sql = ' UPDATE users SET token = :token,
				tokenExpire = DATE_ADD(NOW(), INTERVAL 5 MINUTE)
				WHERE email = :email'
			;
			$stmt = $pdo->prepare($sql);
			$updateEmail = $stmt->execute(['token' => $token, 'email' => $email]);

			// Check if email was updated and send mail
			if ($updateEmail) {
				sendMail($email, $token);
			} else {
				exit('Something went wrong. Please refresh your page and try again');
			}

		} else {
			// Email not registered in database
			exit(json_encode(
				array(
					'status' => 0,
					'msg' => 'Email is not found. Please register an account'
				)
			));
		};

	} else {
	// No email(Empty)
		exit('Please enter your email.');
	};