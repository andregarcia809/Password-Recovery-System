<?php

    // require Database
    require_once 'db.php';

    //  // Connect to DB
    //  try {
    //     $pdo = new PDO($dsn, $user, $password, $options);
    //     // echo 'Connected';
    // } catch (PDOException $e) {
    //     exit("Connection Error: $e->getMessage(), $e->getCode()");
    // }

    $_POST['email'] = 'Andresgarcia809@hotmail.com';
    if (isset($_POST['email'])) {
        // Get Data
        $email = $_POST['email'];

          // Select user from database that matches email
        // 
        // $pdo->prepare('SELECT * FROM users');
        //    $stmt->execute(['email' => $email]);

        //    if ($userInfo =  $stmt->fetch()) {
        //         exit(json_encode($userInfo));
        //    } else {
        //        exit("Your are not register with that email. Please register an account");
        //    };

    }  else {
            exit('Something went wrong');
        };