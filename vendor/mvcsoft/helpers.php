<?php
use models\User as UserModel;

function debug($var) {
    echo '<pre>';
    if(is_array($var) || is_object($var)) {
        print_r($var);
    } else var_dump($var);
    echo '</pre>';
}

function redirect($http = false) {
    if($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    exit;
}

function isAdmin() {
    return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
}