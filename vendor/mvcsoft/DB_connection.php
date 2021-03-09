<?php
namespace vendor\mvcsoft;
use PDO;
use PDOException;

class DB_connection {
    use Singletone;

    public static function connection() {
        $db_info = require ROOT . '/config/config.db.php';
        try {
            $dbConnection = new PDO('mysql:host=' . $db_info['db_host'] . ';dbname=' . $db_info['db_database'] . '; charset=utf8', $db_info['db_username'], $db_info['db_password']);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbConnection->exec("set names utf8");
        } catch (PDOException $e) {
            throw new \Exception('Нет соединения с БД ' . $e->getMessage(), 500);
        }

        return $dbConnection;
    }

}