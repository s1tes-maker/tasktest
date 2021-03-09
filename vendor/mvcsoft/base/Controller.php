<?php
namespace vendor\mvcsoft\base;

abstract class Controller {
    public $route;

    public function __construct($route) {
        $this->route = $route;
    }

    public function render($data) {
        $layout_path = ROOT . '/views/layouts/' . $this->route['prefix'] . 'default.php';
        $view_path = ROOT .'/views/' . $this->route['prefix'] .'/'. lcfirst($this->route['controller']). '/' . $this->route['action'] .'.php';
        $view_path = str_replace('\\', '/', $view_path);
        $layout_path = str_replace('\\', '/', $layout_path);
        $view_obj = new View($data, $view_path, $layout_path);
        $view_obj->run($data);
    }

}