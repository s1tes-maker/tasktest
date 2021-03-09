<?php
namespace vendor\mvcsoft\base;
use PDO;
use vendor\mvcsoft\DB_connection;
use Valitron\Validator;

class Model {
    public $attributes = [];
    public $rules = [];
    public $errors = [];
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

    public function getOne($sql, $params = []) {

        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Inset, Update and others
     */

    public function Query($sql, $params = []) {
        $stmt = $this->dbConnection->prepare($sql);

        if ($stmt->execute($params)) {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * Last autoincrement Id
     */

    public function qInsertId() {
        return $this->dbConnection->lastInsertId();
    }

    public function load($data) {
        foreach($this->attributes as $key => $value) {
            if(isset($data[$key])) {
                $this->attributes[$key] = trim($data[$key]);
            }
        }
    }

    public function validate($data){
        Validator::lang('ru');
        $v = new Validator($data);
        $v->setPrependLabels(false);
        $v->rules($this->rules);

        if($v->validate()) {
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    public function handleAttributes() {
        $this->attributes = array_map(function($item){
            return htmlspecialchars($item, ENT_QUOTES, 'UTF-8');
        }, $this->attributes);
    }

}