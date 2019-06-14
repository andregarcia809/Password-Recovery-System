<?php
    // Database connection with PDO
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

    // Connect to database
    try {
        $pdo = new PDO($dsn, $user, $password, $options);
        echo 'connected';

   }  catch (PDOException $e) {
    exit('Connection Error: ' .$e->getMessage(). ',' .(int)$e->getCode());
}