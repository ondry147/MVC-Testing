<?php

class Application
{

    private $controller = null;
    private $action = null;
    private $params = null;

    public function __construct()
    {
        $this->parseUrl();
        if(!$this->controller)
        {
            require_once APP . 'controllers/Home.php';
            $this->controller = DEFAULT_CONTROLLER;
            $this->controller = new $this->controller();
            $this->action = DEFAULT_ACTION;
            $this->controller->{$this->action}();
        } else {
            if(file_exists(APP . 'controllers/'.$this->controller.'.php'))
            {
                require_once APP . 'controllers/' . $this->controller . '.php';
                $this->controller = new $this->controller;
                if(method_exists($this->controller, $this->action))
                {
                    if(empty($this->params))
                    {
                        $this->controller->{$this->action}();
                    } else {
                        call_user_func_array([$this->controller, $this->action], $this->params);
                    }
                } else {
                    if(strlen($this->action) == 0)
                    {
                        $this->controller->index();
                    } else {
                        $this->redirect('error');
                    }
                }

            } else {
                $this->redirect('error');
            }
        }
        if(ENVIRONMENT == 'dev')
        {
            echo '<br />--DEBUG--:<br />';
            echo 'Controller: ' . get_class($this->controller) .' <br />';
            echo 'Action: ' . $this->action . ' <br />';
            echo 'Params: ' . print_r($this->params, true) . '<br />';
            echo '--DEBUG--<br />';
        }
    }

    public function parseUrl()
    {
        if(isset($_GET['url']))
        {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $this->controller = isset($url[0]) ? $url[0] : null;
            $this->action = isset($url[1]) ? $url[1] : null;
            unset($url[0]);
            unset($url[1]);
            $this->params = array_values($url);
        }


    }

    public function redirect($url)
    {
        header('Location: '.$url);
        exit();
    }

}