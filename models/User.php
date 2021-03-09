<?php
namespace models;
use vendor\mvcsoft\base\Model;

class User extends Model {
    public $attributes = [
        'id' => '',
        'login' => '',
        'password' => '',
        'password_hash' => '',
        'role' => '',
    ];
    public $rules = [
        'required' => ['login', 'password']
    ];

    public function __construct() {
        parent::__construct();
    }

    public function CheckAuth() {
        return isset($_SESSION['user']);
    }

    public function getUserbyLogin() {
        return $this->getOne("SELECT id, login, password_hash, role FROM user  WHERE login = ?", [$this->attributes['login']]);
    }

    public function saveUser() {
        $this->Query("INSERT INTO task (user_name, user_email, content) VALUES (?, ?, ?)", [
            $this->attributes['user_name'], $this->attributes['user_email'], $this->attributes['content']
        ]);

    }

}