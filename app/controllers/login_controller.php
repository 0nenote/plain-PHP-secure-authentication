<?php

class LoginController extends Controller {
    
    public $isCorrect = true ;
    public function index(){
        Controller::view('login/index');
    }
    
    public function login(){
        if(isset( $_POST['email']) && isset( $_POST['password'])){
            $email     = $_POST['email'];
            $password  = $_POST['password'];
            $isValid = User::authenticate($email,$password);
        if($isValid){
             Controller::view('message/index');
        } else{
          $isCorrect = false;
           Controller::view('login/index');
           Controller::view('error/index');
        }
        } else{
              $isCorrect = false;
             Controller::view('error/index');
        }
     
    }   
}