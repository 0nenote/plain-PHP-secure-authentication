<?php
class UserController extends Controller {

    protected $loginAttempts;
    public function __construct() {
         require_once('message_controller.php');
        $this->loginAttempts = new LoginAttempt;
    }
        public function index(){
        Controller::view('home/index');
    }
     public function signup(){
        Controller::view('register/index');
    }
     public function signin(){
     if(isset($_SESSION['user'])){
          call_user_func_array([new MessageController,'index'],[]);
     } else{
            Controller::view('login/index');
     }
     
    }
    public function signOut(){
        unset($_SESSION['user']);
        $this->signin();
    }
    
	public function register(){
		$username  = $_POST['username'];
        $email    = $_POST['email'];
        $pwd     = $_POST['pwd'];
        $phone      = $_POST['phone'];
        $pwd2    = $_POST['pwd2'];
        $error = false;
        $errorMessage = '';
        
        //TODO render error page with coresponding errror message
       if(!isset($username) || trim($username) == '')
        {
            $error = true;
           $errorMessage .= '<br>'. 'You did not fill out the Name fields.';
        }   
         if(!isset($email) || trim($email) == '')
        {
             $error = true;
             $errorMessage .= '<br>'.'You did not fill out the email fields.';
        }   
         if(!isset($pwd) || trim($pwd) == '')
        {
           $error = true;
            $errorMessage .= '<br>'. 'You did not fill out the required fields.';
        }  
         if(!isset($phone) || trim($phone) == '')
        {
             $error = true;
           $errorMessage .= '<br>'. 'You did not fill out the required fields.';
        }   
        if(!isset($pwd2) || trim($pwd2) == '')
        {
            $error = true;
             $errorMessage .= '<br>'. 'You did not fill out the required fields.';
        }  
         
      if(($_POST ["pwd"])!=($_POST["pwd2"]))
        {
            $error = true;
            $errorMessage .= '<br>'. 'Password does not match try again';
       }
        
	switch(Controller::validateInput()){ 
			case 1 :
                $today = date("Y-m-d H:i:s");   
				$user = new User(0, $username, $email, $pwd, $phone, $today);
				$userAdded = $user->addUser();
				if(!$userAdded){
                     $error = true;
				     $errorMessage .= '<br>'.'adding user failed';
					}	
				break;
			case 2: 
                $error = true;
				$errorMessage .= '<br>'.'captcha was not checked';
				break;
			
			case 3:
                $error = true;
				$errorMessage .= '<br>'.'captcha is missing from site';
				break;
			
			default:
                $error = true;
				$errorMessage .= '<br>'.'unknown error';
		}
        
        if($error){
             Controller::view('register/index');
              Controller::view('error/index');
              echo $errorMessage;
        } else{
             Controller::view('login/index');
             Controller::view('success/index');
        }
    }
    
    public function findUser($id){
		$userFound = User::findUserById($id);
		
		if(!empty($userFound->getId())){
			echo "user found!!!";
		}
    }
    
    public function findUserId($email){
        return User::findUserId($email);
    }
    

    
    public function login(){
     if(!isset($_SESSION['user'])){
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email     = $_POST['email'];
            $password  = $_POST['password'];
            $userId    = $this->findUserId($email);
            $clientIp  = $_SERVER['REMOTE_ADDR'];
        if($this->loginAttempts->getLoginAttempts($userId,$clientIp) >= 3){
           Controller::view('login/index');
           Controller::view('error/index');
           echo 'Too many attempts, user account locked!!';
        } else{
        if(User::authenticate($email,$password)){
            $this->loginAttempts->resetLoginAttempts($userId,$clientIp);
            call_user_func_array([new MessageController,'index'],[]);
            // Controller::view('message/index');
        } else{
           $this->loginAttempts->incrementLoginAttempt($userId,$clientIp);
           Controller::view('login/index');
           Controller::view('error/index');
           }
        } 
        } else{
           Controller::view('login/index');
        }
        } else{
        call_user_func_array([new MessageController,'index'],[]);
    }
    } 
    
}