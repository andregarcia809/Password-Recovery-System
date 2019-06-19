<?php
    require 'db.php';

    $searchQuery = validate($_POST['query']);
    $filterColumn = validate($_POST['column']);

    function validate($str) {
        return trim(htmlspecialchars($str));
    }


    if ( !empty($searchQuery) ) {

        if (isset($filterColumn)) {
            switch ($filterColumn) {
                case 'firstName':
                $filterColumn = 'firstName';
                break;
                case 'lastName':
                $filterColumn = 'lastName';
                break;
                case 'email':
                $filterColumn = 'email';
                break;
                default:
                $filterColumn = 'firstName';
            }
        }

        $params = array(
            'firstName' => 'firstName',
            'lastName' => 'lastName',
            'email' => 'email'
        );

        // Check search result in database
        // $searchQuery = "%$searchQuery%";
        // $filterColumn = $params[$params];
        // var_dump($params);

        $sql = "SELECT firstName, lastName, email FROM users WHERE $filterColumn LIKE :searchQuery";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':searchQuery' => "%$searchQuery%"]);
        $row = $stmt->fetchAll();

        if($row) {
            exit(json_encode($row));
        } else {
            exit(json_encode(
            array(
                'error' => 'colleagues not found',
                'errorMsg' => 'Your query did not match any colleagues'
            )));
        }
    } else {
        exit(json_encode(
            array(
                'error' => 'empty',
                'errorMsg' => 'empty'
            )));
    }