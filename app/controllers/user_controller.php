<?php
class UserController extends Controller {

    public function __construct() {
    }
    
    public function index(){
        Controller::view('register/index');
    }
    
	public function register($username,$email,$pwd,$phone){
		
		
        $today = date("Y-m-d H:i:s");   
		$user = new User(0, $username, $email, $pwd, $phone, $today);
		$userAdded = $user->addUser();
		if($userAdded){
		  print_r($user);
        } else {
		  echo 'adding user failed';
		}
		
		switch(Controller::validateInput()){ 
			
			case 1 :
				
				$today = date("Y-m-d H:i:s");   
				$user = new User(0, $username, $email, $pwd, $phone, $today);
				$userAdded = $user->addUser();
					if($userAdded){
						echo "user added successfully";
					} else {
						
						echo 'adding user failed';
					}
					
				break;
			case 2: 
				echo "captcha was not checked";
				break;
			
			case 3:
				echo "captcha is missing from site";
				break;
			
			default:
				echo "unknown error";
		}
    }
    
    public function findUser($id){
		$userFound = User::findUserById($id);
		
		if(!empty($userFound->getId())){
			echo "user found!!!";
		}
    }
    
}