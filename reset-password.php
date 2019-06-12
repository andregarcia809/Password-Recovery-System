<?php
require_once 'db.php';
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    $sql = 'SELECT id FROM users WHERE email = :email AND  token = :token AND token<> AND tokenExpire > NOW()';

} else {
    header('Location: forgot-password.php');
    exit();
}