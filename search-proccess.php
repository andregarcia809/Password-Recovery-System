<?php
require 'db.php';

$searchQuery = validate($_POST['query']);
$filterColumn = validate($_POST['column']);

function validate($str) {
    return trim(htmlspecialchars($str));
}


if ( !empty($searchQuery) ) {
    // Set default for filterColumn
    if ($filterColumn === '' || ($filterColumn !== 'lastName' && $filterColumn !== 'email') ) {
        $filterColumn = 'firstName';
    }

    // Check search result in database
    $sql = 'SELECT firstName, FORM users WHERE  :filterColumn LIKE "%:searchQuery"';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['filterColumn' => $filterColumn, 'searchQuery' => $searchQuery]);
    $row = $stmt->fetchAll();

    if($row) {
        
    } else {
        exit(json_encode(
            array(
                'error' => '0',
                'databaseMsg' => 'Found'
            )));
    }
    exit(json_encode(
        array(
            'error' => 'colleagues not found',
            'databaseMsg' => 'Your query did not match any colleagues'
        )));
} else {
    exit(json_encode(
        array(
            'error' => 'empty',
            'databaseMsg' => 'empty'
        )));
}