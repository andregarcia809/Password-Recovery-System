<?php
    require_once 'db.php';
    require_once 'functions.php';


    if (isset($_GET['email']) && isset($_GET['token'])) {
        $email = $_GET['email'];
        $token = $_GET['token'];

        // token<>"" = not empty MYSQL
        // Match email and token with database
        $sql = 'SELECT id FROM users WHERE email = :email AND  token = :token AND token<>"" AND tokenExpire > NOW()';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email, 'token' => $token]);
        $row = $stmt->fetch();

        // if row Matches email and token create new password
        if ($row) {
            $newPassword = generateNewString();
            $newPasswordEncrypted = password_hash($newPassword, PASSWORD_BCRYPT);

            // Update new password in database
            $sql = 'UPDATE users SET token = "", password = :newPasswordEncrypted WHERE email = :email';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['newPasswordEncrypted' => $newPasswordEncrypted, 'email' => $email]);

            // Display new password to user
            echo "Your new password is $newPassword <br>
                <a href='login.php'>Log in to your account</a>
            ";
        } else {
            redirectToLoginPage();
        }
    } else {
        redirectToLoginPage();
    }