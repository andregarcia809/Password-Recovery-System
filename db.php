<?php

    // Database connection with PDO
    // $host = 'localhost';
    // $user = 'root';
    // $password = '';
    // $dbname = 'forgotPassword';
    // $charset = 'utf8mb4';

    // $dsn = "mysql:host = $host; dbname = $dbname; charset = $charset";
    // $options = [
    //     PDO::ATTR_ERRMODE            =>  PDO::ERRMODE_EXCEPTION,
    //     PDO::ATTR_DEFAULT_FETCH_MODE =>  PDO::FETCH_ASSOC,
    //     PDO::ATTR_EMULATE_PREPARES   =>  false,
    // ];
    $host = 'localhost';
    $db   = 'test';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    // try {
         $pdo = new PDO($dsn, $user, $pass);
    // } catch (\PDOException $e) {
    //      throw new \PDOException($e->getMessage(), (int)$e->getCode());
    // }