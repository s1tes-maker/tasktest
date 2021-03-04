<?php
namespace vendor\mvcsoft;

class ErrorHandler {
    public function __construct() {
        switch(ENVIRONMENT) {
            case 'development':
                error_reporting(E_ALL);
                break;
            case 'production':
                error_reporting(0);
                break;
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e) {
        $this->displayError('исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $responce = 404) {
        http_response_code($responce);

        switch(ENVIRONMENT) {
            case 'production':
                echo $errcode;
                if($responce == 404) {
                    require ROOT . '/public/errors/404.php';
                    die();
                }
                require ROOT . '/public/errors/production.php';
                break;
            case 'development':
                require ROOT . '/public/errors/development.php';
                break;
        }
    }
}