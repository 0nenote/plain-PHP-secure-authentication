<?php
require_once('controllers/controller.php');

class Application {
    
    protected $controller   = "home_controller";
    protected $method       = 'index';
    protected $params       = [];
    
    public function __construct(){
       $url = $this->parseUrl();
        
        switch($url[0]){
            case "home" :
                $this->controller = "home_controller";
                break;
            case "login" :
                $this->controller = "login_controller";
                break;
            case "register" :
                $this->controller = "user_controller";
                break;
            case "user" :
                $this->controller = "user_controller";
                break;
            default : 
                 $this->controller = "home_controller";
                
        }
        if(stream_resolve_include_path('controllers/' . $this->controller .'.php')){
            unset($url[0]);
        }
        
         require_once 'controllers/' . $this->controller . '.php';
         $splitctrl  = explode('_', $this->controller);
         $ctrName =  ucfirst($splitctrl[0]).'Controller';
         
		 require_once('models/model.php');
          require_once('models/user.php');
		  
         $this->controller = new $ctrName;
        
        
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