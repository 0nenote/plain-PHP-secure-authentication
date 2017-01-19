<?php

class LoginController extends Controller {
    
    public function index(){
        Controller::view('login/index');
    }
    
    public function login(){
        $email     = $_POST['email'];
        $password  = $_POST['password'];
        
        $isValid = User::authenticate($email,$password);
     if($isValid){
             Controller::view('message/index');
        } else{
            echo 'NOPE!';
        }
    }   
}