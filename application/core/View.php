<?php

class View {
    public $layout = 'default';

    public function render ($view, $title, $vars=[]) {
        extract($vars);
        ob_start();
        require 'application/views/'.$view.'.php';
        $content = ob_get_clean();
        require 'application/views/layouts/'.$this->layout.'.php';
    }

}










