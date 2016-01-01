<?php

class Home extends Controller
{

    public function index()
    {
        $this->view = 'home/index';
        $this->header['title'] = 'Home';
        $this->header['keywords'] = 'home, homepage, news';
        $this->header['description'] = 'Default site with news...';

        require_once APP . 'models/HomeModel.php';
        $home = new HomeModel();

        $this->data['name'] = $home->getName();
        $this->printView();
    }

    public function info($id = null)
    {
        $this->view = 'home/info';
        $this->header['title'] = 'Home';
        $this->header['keywords'] = 'home, homepage, news';
        $this->header['description'] = 'Default site with news...';
        if(isset($id))
        {
            $this->data['content'] = 'Blablabla';
        } else {
            $this->data['content'] = 'Error';
        }
        $this->printView();
    }

}