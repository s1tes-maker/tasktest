<?php
namespace vendor\mvcsoft\base;

class View {
    public $data = [];
    public $view_path;
    public $layout_path;

    public function __construct($data, $view_path , $layout_path = false) {
        $this->data = $data;
        $this->view_path = $view_path;
        $this->layout_path = $layout_path;
    }

    public function run($data) {
        if(!file_exists($this->view_path)) {
            throw new \Exception("не найден вид {$this->view_path}", 404);
        }

        if(is_array($data)) {
            extract($data);
        }

        ob_start();
        require_once $this->view_path;
        $content = ob_get_clean();

        if(!file_exists($this->layout_path)) {
            throw new \Exception("не найден шаблон {$this->layout_path}", 404);
        }
        require_once $this->layout_path;
    }
}