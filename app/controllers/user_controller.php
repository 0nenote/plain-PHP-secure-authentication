<?php
class UserController extends Controller {

    public function __construct() {
    }

    public function index(){
        echo "User/index";
    }
    
	public function registerUser($name,$stillToDo){
	   //TODO
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
?>