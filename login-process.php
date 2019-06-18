<?php
    require_once 'db.php';
    require_once 'functions.php';

    // validate function
    function validate($str) {
        return trim(htmlspecialchars($str));
    }

    // Get data
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    // Check for empty fields
    if ( !empty($email) && !empty($pass) ) {

         //Validate Email
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            exit(json_encode(
                array(
                    'error' => 'email error',
                'errorMsg' => 'Invalid Email'
            )));
        } else {
            // Check if user exist
            $sql = 'SELECT id, password FROM users WHERE email = :email';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['email' => $email]);
            $row = $stmt->fetch();
            if ($row) {
                // User found
                // Check for password match
                if ( password_verify($pass, $row['password']) ) {
                    // Password matches redirect to dashboard
                    exit(json_encode(
                        array(
                            'error' => 0,
                            'successMsg' => ''
                        )));
                } else {
                    // Password does not match
                    exit(json_encode(
                    array(
                        'error' => 'wrong password',
                        'loginMsg' => 'Wrong password'
                    )));
                }
                exit(json_encode(
                    array(
                        'error' => 0,
                        'successMsg' => ''
                    )));
            } else {
                // No email match
                exit(json_encode(
                array(
                    'error' => 'email not found',
                    'loginMsg' => 'There is no account associated with this email'
                )));
            }
        }
    } else {
        // Fields empty
        exit ('empty');
    };