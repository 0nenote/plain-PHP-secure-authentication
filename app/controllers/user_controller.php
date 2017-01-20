<?php
class UserController extends Controller {

    public function __construct() {
    }

        public function index(){
        Controller::view('register/index');
    }
    
	public function register(){
		
		$username  = $_POST['username'];
        $email    = $_POST['email'];
        $pwd     = $_POST['pwd'];
        $phone      = $_POST['phone'];
        $pwd2    = $_POST['pwd2'];
        
       if(!isset($username) || trim($username) == '')
        {
            echo "You did not fill out the Name fields.";
        }   
         if(!isset($email) || trim($email) == '')
        {
            echo "You did not fill out the email fields.";
        }   
         if(!isset($pwd) || trim($pwd) == '')
        {
            echo "You did not fill out the required fields.";
        }  
         if(!isset($phone) || trim($phone) == '')
        {
            echo "You did not fill out the required fields.";
        }   
        if(!isset($pwd2) || trim($pwd2) == '')
        {
            echo "You did not fill out the required fields.";
        }  
        
        
      if(($_POST ["pwd"])!=($_POST["pwd2"]))
        {
            echo "Password does not match try again";
       }
       else
       {
        $today = date("Y-m-d H:i:s");   
		$user = new User(0, $username, $email, $pwd, $phone, $today);
		$userAdded = $user->addUser();
		if($userAdded)
        {
			echo 'adding user succeeded!!!!!!! yayyyy party time';
		} 
           
          else 
           {
			echo 'adding user failed';
		   }
		
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