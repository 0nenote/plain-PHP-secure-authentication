<?php

class User extends Model{

    private $id;
    private $name;
    private $email;
    private $pass;
    private $phone;
    private $lastActive;
    
    public function __construct($id = 0, $name = '', $email='',$pass='',$phone='',$lastActive='') {
      $this->id         = $id;
      $this->name       = $name;
      $this->email      = $email;
      $this->pass       = $pass;
      $this->phone      = $phone;
      $this->lastActive = $lastActive;   
    }
	
	public function getName(){
		return $this->name;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getPass(){
		return $this->pass;
	}
	public function getPhone(){
		return $this->phone;
	}
	public function getLastActive(){
		return $this->lastActive;
	}
	public function getId(){
		return $this->id;
	
	}

    public function index(){
        echo "User/index";
    }
    
	public function addUser(){
        
		
		if(Model::checkEmail($this->email) && Model::checkLetters($this->name) && Model::checkPhone($this->phone) && Model::checkPass($this->pass)){
		
		/********************************/ 			  // XSS mitigation part
 		
			//<-!xXx>360NoScopE<xXx!->@email.com
		
		/********************************/
				
		$db = Db::getInstance();
	    $stmt = $db->prepare("INSERT INTO users(name, password, email, phone, lastActive) VALUES (:name, :pwd, :email, :phone, :lastActive)");
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':pwd', $this->pass);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':phone', $this->phone);	
		$stmt->bindParam(':lastActive', $this->lastActive);

		$stmt->execute();
		return true;
		}
		else{
			return false;
		}
		

		
	}
    
    public function findUserById($id){
      $id = intval($id);
	  $db = Db::getInstance();
      $req = $db->prepare('SELECT * FROM users WHERE id = :id');
      $req->execute(array('id' => $id));
      $user= $req->fetch();
	  
      return new User($user['id'], $user['username'], $user['email'],$user['password'],$user['phonenumber'],$user['date']);  
    }
    
     public static function authenticate($email, $password){
      $db = Db::getInstance();
      $req = $db->prepare('SELECT email,password FROM users WHERE email = :email');
      $req->execute(array('email' => $email));
      $user= $req->fetch();
        if($password === $user['password']){
            return true;
        } else{
            if($user['password'] === $password){
                  echo $user['password'] . ' ' . $user['email'];
            }
          
            return false;
        }     
    }
}
