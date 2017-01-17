<?php
require_once('controllers/Controller.php');

class Application {
    
    protected $controller   = 'home_controller';
    protected $method       = 'index';
    protected $params       = [];
    
    public function __construct(){
       $url = $this->parseUrl();
        if(file_exists('controllers/' . $url[0] .'.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
        
        require_once 'controllers/' . $this->controller . '.php';
        
        //naam default controller bestand verschilt met class naam
        $this->controller = new $this->controller;
        
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
       $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller,$this->method],$this->params);
    }
    
    protected function parseUrl(){
        if(isset($_GET['url'])){
           return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
        }        
    }
}