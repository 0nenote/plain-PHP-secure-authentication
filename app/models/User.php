<?php
class User {

    private $id;
    private $name;
    private $email;
    private $pass;
    private $phone;
    private $lastActive;
    private $db;
    
    public function __construct($id = 0, $name = '', $email='',$pass='',$phone='',$lastActive='') {
      $this->id         = $id;
      $this->name       = $author;
      $this->email      = $email;
      $this->pass       = $pass;
      $this->phone      = $phone;
      $this->lastActive = $lastActive;
      $this->db         = Db::getInstance();    
    }

    public function index(){
        echo "User/index";
    }
    
	public function addUser($email,$pwd,$name,$phone){
	   
	}
    
    public function findUserById($id){
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM users WHERE id = :id');
      $req->execute(array('id' => $id));
      $user= $req->fetch();

      return new User($user['id'], $user['name'], $user['email'],$user['password'],$user['phone'],$user['last_active']);  
    }
    
     public static function isValid($email,$password){
      $db = Db::getInstance();
      $req = $db->prepare('SELECT email,password FROM users WHERE email = :email');
      $req->execute(array('email' => $email));
      $user= $req->fetch();
        if(password_verify($password, $user['password'])){
            return true;
        } else{
            return false;
        }     
    }
}
