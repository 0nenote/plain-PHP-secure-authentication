<?php
class RegisterController extends Controller {

    public function __construct() {
    }
    
        public function index(){
         Controller::view('register/index');
    }
    
}