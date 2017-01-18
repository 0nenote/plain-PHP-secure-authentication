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
			
    }
    
    public function findUser($id){
        
    }
    
    public function authenticate($email,$password){
        $isValid = User::isValid($email,$password);
        if($isValid){
            echo 'YEAH!';
        } else{
            echo 'NOPE!';
        }
    }
}