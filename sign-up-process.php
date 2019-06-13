<?php

// Get Data
$fullName = validate($_POST['name']);
$email = validate($_POST['email']);
$password = validate($_POST['password']);
$confirmPassword = validate($_POST['confirm-password']);

// Validating function
function validate($str) {
	return trim(htmlspecialchars($str));
}

// Check for empty fields
if (!empty($fullName) && !empty($email) && !empty($password) && !empty($confirmPassword) ) {
    // Fields not empty
    // Set errors variables
    $nameError = $emailError =$passwordError = $passwordMatchError = '';

    // check whether the name only contains letters and white spaces
    if (!preg_match('/^[a-zA-Z\s]+$/', $fullName)) {
        $nameError = 'Error: Name can only contain letters and white spaces';
        exit($nameError);
    }

    //Validate Emails
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Error: Invalid Email';
        exit($emailError);
    }

    //Password Validation
    if (!preg_match('/\A(?=[\x20-\x7E]*?[A-Z])(?=[\x20-\x7E]*?[a-z])(?=[\x20-\x7E]*?[0-9])[\x20-\x7E]{6,}\z/', $password)) {
        $passwordError = 'Error: Password must contain at least one upper case letter, one lower case letter and one digit and be at least 6 characters long';
        exit( $passwordError);
    }

    // Check for password match
    if ($password !== $confirmPassword ) {
        $passwordMatchError = 'Error: Passwords must match';
        exit($passwordMatchError);
    }

    if(empty($nameError) && empty($emailError) && empty($passwordError) && empty($passwordMatchError)) {
        exit ('Account has been created. Please log in');
    }
} else {
    // Fields empty
    exit ('empty');
};