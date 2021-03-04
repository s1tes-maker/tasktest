<?php
namespace controllers;
use vendor\mvcsoft\base\Controller;
use models\Task as TaskModel;

class IndexController extends Controller {

    public function showAction() {
        $TaskModel = new TaskModel();
        $data = ['tasks' => $TaskModel->getAllTasks()];
        $this->render($data);
    }
}


