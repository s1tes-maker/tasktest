<?php
namespace controllers;
use vendor\mvcsoft\base\Controller;
use models\Task as TaskModel;
require_once ROOT . '/vendor/mvcsoft/helpers/pagination.php';

class IndexController extends Controller {

    public function showAction() {

        $TaskModel = new TaskModel();

        $save_post_params = ['sort_field' => '', 'sort_direction' => ''];

        $sort = '';
        if(isset($_POST['sort_field'])) {
            switch ($_POST['sort_field']) {
                case 'user_name' : $sort = 'name'; break;
                case 'user_email' : $sort = 'email'; break;
                case 'status' : $sort = 'status'; break;
                default : $sort = ''; break;
            }
            if($sort != '') {
                $save_post_params['sort_field'] =  $_POST['sort_field'];
            }
            if(isset($_POST['sort_direction']) && $sort != '') {
                switch ($_POST['sort_direction']) {
                    case 'asc' : $sort.= 'a'; break;
                    case 'desc' : $sort.= 'd'; break;
                }
                $save_post_params['sort_direction'] =  $_POST['sort_direction'];
            }
        }
        $sortParams = [];
        if($sort != '') $sortParams = ['sort' => $sort];
        if($sort== '' && isset($_GET['sort'])) $sort = $_GET['sort'];

        if(isset($_GET['sort'])) {
            switch ($sort) {
                case 'namea' :
                    $save_post_params= [
                        'sort_field' => 'user_name',
                        'sort_direction' => 'asc'];
                    break;
                case 'named' :
                    $save_post_params= [
                        'sort_field' => 'user_name',
                        'sort_direction' => 'desc'];
                    break;
                case 'emaila' :
                    $save_post_params= [
                        'sort_field' => 'user_email',
                        'sort_direction' => 'asc'];
                    break;
                case 'emaild' :
                    $save_post_params= [
                        'sort_field' => 'user_email',
                        'sort_direction' => 'desc'];
                    break;
                case 'statusa' :
                    $save_post_params= [
                        'sort_field' => 'status',
                        'sort_direction' => 'asc'];
                    break;
                case 'statusd' :
                    $save_post_params= [
                        'sort_field' => 'status',
                        'sort_direction' => 'desc'];
                    break;
            }
        }
        $appParams = require_once ROOT . '/config/app_params.php';
        $pagination = paginationView(array_merge($_GET, $sortParams), $appParams['pagination'], $TaskModel->getTotalTasks());

        $tasks = $TaskModel->getAllTasks($appParams['pagination'], $pagination['start_item'], $sort);
        $alertMessage = [];

        $data = [
            'tasks' => $tasks,
            'old_post_params' => $save_post_params,
            'htmlItems' => $pagination['htmlItems']
        ];
        $this->render($data);
    }

    public function addAction() {
        $TaskModel = new TaskModel();

        $success = null;
        if(!empty($_POST)) {
            $TaskModel->load($_POST);

            $TaskModel->validate($TaskModel->attributes);
            $success = false;
            if($TaskModel->errors == []) {
                $TaskModel->saveTask();
                $success = true;
            }
        }

        $data = [
            'errors' => $TaskModel->errors,
            'success' => $success
        ];
        $this->render($data);
    }

    public function editAction() {
        if(!isAdmin() || !isset($_GET['id'])) redirect('/');
        if($_GET['id'] == '') redirect('/');

        $id = (int)$_GET['id'];

        $TaskModel = new TaskModel();
        $success = null;

        if(!empty($_POST)) {
            if(isset($_POST['content'])) {
                $TaskModel->attributes['content'] = $_POST['content'];
                $TaskModel->attributes['id'] = $id;
                $TaskModel->rules = [
                    'required' => ['content']];
                $TaskModel->validate($TaskModel->attributes);
                $success = false;
                if($TaskModel->errors == []) {
                    $TaskModel->updateTask();
                    $success = true;
                }
            }
        }

        $taskData = $TaskModel->getTaskById($id);
        if(!$taskData) redirect('/');

        $this->render([
            'task' => $taskData,
            'success' => $success,
            'errors' => $TaskModel->errors,
        ]);
    }

}


