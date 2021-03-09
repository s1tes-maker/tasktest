<?php
namespace models;
use vendor\mvcsoft\base\Model;

class Task extends Model {
    public $attributes = [
        'user_name' => '',
        'user_email' => '',
        'content' => '',
        'modified' => ''
    ];
    public $rules = [
        'required' => ['user_name', 'user_email', 'content'],
        'email' => [
            ['user_email']
        ],
    ];

    public function __construct() {
        parent::__construct();
    }

    public function getAllTasks($limit, $offset, $sort) {
        $sql = '';
        switch($sort) {
            case 'namea' : $sql= ' ORDER BY user_name ASC'; break;
            case 'named' : $sql= ' ORDER BY user_name DESC'; break;
            case 'emaila' : $sql= ' ORDER BY user_email ASC'; break;
            case 'emaild' : $sql= ' ORDER BY user_email DESC'; break;
            case 'statusa' : $sql= ' ORDER BY CAST(status AS CHAR) ASC'; break;
            case 'statusd' : $sql= ' ORDER BY CAST(status AS CHAR) DESC'; break;
        }
        return $this->getAll("SELECT id, user_name, user_email, content, status, admin_modified  FROM task {$sql} LIMIT {$limit} OFFSET {$offset}");
    }

    public function getTotalTasks() {
        $res = $this->getOne("SELECT COUNT( * ) as count FROM  `task`");
        return $res['count'];
    }

    public function saveTask() {

        $this->handleAttributes();

        $this->Query("INSERT INTO task (user_name, user_email, content) VALUES (?, ?, ?)", [
            $this->attributes['user_name'], $this->attributes['user_email'], $this->attributes['content']
        ]);

    }

    public function updateTask() {

        $this->handleAttributes();

        $this->Query("UPDATE task SET content = ?, status = 'выполнено', admin_modified = 'отредактировано администратором' WHERE id = ?",
            [
                $this->attributes['content'],
                $this->attributes['id'],
                ]);

    }

    public function getTaskById($id) {
        return $this->getOne("SELECT id, user_name, user_email, content, status, admin_modified  FROM task WHERE id = ?", [$id]);
    }

}