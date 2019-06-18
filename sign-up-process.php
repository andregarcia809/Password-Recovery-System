<?php
    require_once 'functions.php';

    // Get Data
    $fullName = validate($_POST['name']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $confirmPassword = validate($_POST['confirm-password']);

    // Validating function
    function validate($str) {
        return trim(htmlspecialchars($str));
    }

    // Save data in database
    function createAccount () {
        // Get Data from user
        $fullName = validate($_POST['name']);
        $email = validate($_POST['email']);
        $pass = validate($_POST['password']);

        // hash password
        $hash_password = password_hash($pass, PASSWORD_BCRYPT);

        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'forgotPassword';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            =>  PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE =>  PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   =>  false,
        ];

        // Connect to db
        try {
            $pdo = new PDO($dsn, $user, $password, $options);

            if ($pdo) {
                // Check if account already exist
                $sql = 'SELECT id FROM users WHERE email = :email';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['email' => $email]);
                $row = $stmt->fetch();

                if (!$row) {
                    // create account
                    $sql = 'INSERT INTO users(name, email, password)
                    VALUES(:name, :email, :password)
                    ';
                    $stmt = $pdo->prepare($sql);
                    $accountCreated =  $stmt->execute(['name' => $fullName, 'email' => $email, 'password' => $hash_password]);

                    exit(json_encode(
                        array(
                            'name' => $fullName,
                            'error' => 0,
                            'successMsg' => 'Account has been created. <br>Please sing in'
                        )));

                } else {
                    // account already exist, don't create account
                    exit(json_encode(
                    array(
                        'error' => 'already registered',
                        'registeredMsg' => 'An account already exists for this email. <br>Please sign in'
                    )));
                }

            } else {
                // Failed
                exit(json_encode(
                array(
                    'error' => 'database',
                    'databaseMsg' => 'Something went wrong please try again'
                )));
            }

        } catch (PDOException $e) {
            exit(json_encode(
                array(
                    'error' => 'database',
                'databaseMsg' => 'Connection Error: ' .$e->getMessage(). ',' .(int)$e->getCode()
            )));
        }
    }


    // Check for empty fields
    if (!empty($fullName) && !empty($email) && !empty($pass) && !empty($confirmPassword) ) {
        // Fields not empty
        // Set error variable
        $error = false;

        // check whether the name only contains letters and white spaces
        if (!preg_match('/^[a-zA-Z\s]+$/', $fullName)) {
            $error = true;
            exit(json_encode(
                array(
                    'error' => 'name',
                'errorMsg' => 'Name can only contain letters and white spaces'
            )));
        }

        //Validate Email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = true;
            exit(json_encode(
                array(
                    'error' => 'email',
                'errorMsg' => 'Invalid Email'
            )));
        }

        //Password Validation
        if (!preg_match('/\A(?=[\x20-\x7E]*?[A-Z])(?=[\x20-\x7E]*?[a-z])(?=[\x20-\x7E]*?[0-9])[\x20-\x7E]{6,}\z/', $pass)) {
            $error = true;
            exit(json_encode(
                array(
                    'error' => 'password',
                'errorMsg' => 'Password must contain at least one upper case letter, one lower case letter and one digit and be at least 6 characters long'
            )));
        }

        // Check for password match
        if ($pass !== $confirmPassword ) {
            $error = true;
            exit(json_encode(
                array(
                    'error' => 'password match',
                'errorMsg' => 'Passwords must match'
            )));
        }

        // No Errors save Data to database
        if($error === false) {
            createAccount();
        }
    } else {
        // Fields empty
        exit ('empty');
    };