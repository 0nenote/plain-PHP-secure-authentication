<?php
class Controller
{
    public function model($model){
        require_once 'models/' . $model . '.php';
        return new $model();
    }    
    
    public function view($view, $data = []){
		
		
         require_once '../app/views/' . $view . '.php';
    }
	
	public function validateInput(){
		
		$secretKey = "6LclkxIUAAAAADdEiNz2c3TyTA3OBxrWuknjxHKY";
		
		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
        
		
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
			$data = json_decode($response);
		
				if(isset($data->success) && $data->success==true){
					return 1; //everything went better than expected
				}
				else{
					return 2; // captcha was not checked
				}
			
		}
		
		else{
				
			return 3; // captcha is missing from site
		}

	}
    
    
}