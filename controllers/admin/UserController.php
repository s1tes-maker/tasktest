<?php
namespace controllers\admin;
use vendor\mvcsoft\base\Controller;
use models\User as UserModel;

class UserController  extends  Controller {

    public function loginAction() {

        $success = null;
        $userModel = new UserModel();

        if(!empty($_POST)) {

            $userModel->load($_POST);
            $userModel->validate($userModel->attributes);
            $success = false;

            if($userModel->errors == []) {
                $user = $userModel->getUserbyLogin();
                if($user != []) {
                    if(password_verify($userModel->attributes['password'], $user['password_hash']) && $user['role'] == 'admin') {
                        $success = true;
                        $_SESSION['user'] = [
                            'id' => $user['id'],
                            'login' => $user['login'],
                            'role' => $user['role']
                        ];
                    } else {
                        $userModel->errors['password'][0] = 'Неверный логин или пароль';
                    }
                }
            }
        }
        $this->render([
            'errors' => $userModel->errors,
            'success' => $success]);
    }

    public function logoutAction() {
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }

}