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
   

    // $searchQuery = 'garcia';
    // $searchQuery = "%$searchQuery%";
    // $filterColumn = 'lastName';
    // $sql = "SELECT firstName, lastName, email FROM users WHERE $filterColumn LIKE :searchQuery";
    // Connect to database
    try {

        $pdo = new PDO($dsn, $user, $password, $options);
        // echo 'connected';
        // $sql = 'SELECT firstName, lastName, email FROM users WHERE'.$filterColumn.'LIKE :searchQuery';
        // $stmt = $pdo->prepare($sql);
        // // $stmt->bindParam('searchQuery', $searchQuery, PDO::PARAM_STR);
        // $stmt->execute([':searchQuery' => $searchQuery]);
        // echo '<pre>';
        // var_dump($row = $stmt->fetchAll());

   }  catch (PDOException $e) {
    exit('Connection Error: ' .$e->getMessage(). ',' .(int)$e->getCode());
}