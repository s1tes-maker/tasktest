<?php
namespace vendor\mvcsoft;
use vendor\mvcsoft\base\Router;

class App {
    public function __construct() {
        new ErrorHandler();
        Router::run();
    }
}