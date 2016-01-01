<?php

class Controller
{

    protected $data = [];
    protected $view = null;
    protected $header = ['title' => '', 'keywords' => '', 'description' => ''];

    public function printView()
    {
        extract($this->header);
        extract($this->data);
        require_once APP . 'views/' . $this->view . '.php';
    }

}

?>