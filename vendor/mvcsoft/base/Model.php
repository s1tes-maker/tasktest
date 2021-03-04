<?php
namespace vendor\mvcsoft\base;
use PDO;
use vendor\mvcsoft\DB_connection;

class Model {
    public $attributes = [];
    public $rules = [];
    protected $dbConnection;

    public function __construct() {
        $DB_connection_obj = DB_connection::instance();
        $this->dbConnection = $DB_connection_obj::connection();
    }

    public function getAll($sql, $params = []) {
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getOne($sql, $params) {

        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Inset, Update and others
     */

    function Query($sql, $params) {
        $stmt = $this->dbConnection->prepare($sql);

        if ($stmt->execute($params)) {
            return TRUE;
        }

        return FALSE;

    }

    /**
     * Last autoincrement Id
     */

    function qInsertId() {
        return $this->dbConnection->lastInsertId();
    }
}