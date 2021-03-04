<?php
namespace models;
use vendor\mvcsoft\base\Model;

class Task extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllTasks() {
        return $this->getAll('SELECT user_name, user_email, content, status FROM task');
    }


}