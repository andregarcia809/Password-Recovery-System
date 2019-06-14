<?php
    // Generate token
    function generateNewString($length = 10) {
        $token = 'lojefljeoijfijfike545415';
        $token = str_shuffle($token);
        $token = substr($token, 0, $length);
        return $token;
    }

    function redirect($url) {
        header('Location:'.$url. '.php');
        exit();
    }