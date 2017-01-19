<?php
class UserController extends Controller {

    public function __construct() {
    }
    
        public function index(){
        echo "User/index";
    }
    
	public function register($username,$pwd,$email,$phone){
		$tz_object = new DateTimeZone('Europe/Amsterdam');
		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
        User::addUser($user);
    }
    
    public function findUser($id){
        
    }
    
}