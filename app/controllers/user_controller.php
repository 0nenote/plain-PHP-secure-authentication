<?php
class UserController extends Controller {

    public function __construct() {
    }
    
        public function index(){
        echo "User/index";
    }
    
	public function register($username,$email,$pwd,$phone){
		
		$today = date("Y-m-d H:i:s");   
		$user = new User(0, $username, $email, $pwd, $phone, $today);
		$userAdded = $user->addUser();
		if($userAdded){
			echo 'adding user succeeded!!!!!!! yayyyy party time';
		} else {
			echo 'adding user failed';
		}
    }
    
    public function findUser($id){
		$userFound = User::findUserById($id);
       if(!empty($userFound->getId())){
			echo "user asdsdfghjhgfds";
		}	
		
        
    }
    
}