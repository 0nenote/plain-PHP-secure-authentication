<?php

/**
 * Class User
 */
class User extends Model{

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $pass;
    /**
     * @var string
     */
    private $phone;
    /**
     * @var string
     */
    private $lastActive;

    /**
     * User constructor.
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $pass
     * @param string $phone
     * @param string $lastActive
     */
    public function __construct($id = 0, $name = '', $email='', $pass='', $phone='', $lastActive='') {
      $this->id         = $id;
      $this->name       = $name;
      $this->email      = $email;
      $this->pass       = password_hash($pass, PASSWORD_BCRYPT); //hash with a safe salt
      $this->phone      = $phone;
      $this->lastActive = $lastActive;
      parent::__construct();
    }

    /**
     * @return string
     */
    public function getName(){
		return $this->name;
	}

    /**
     * @return string
     */
    public function getEmail(){
		return $this->email;
	}

    /**
     * @return string
     */
    public function getPass(){
		return $this->pass;
	}

    /**
     * @return string
     */
    public function getPhone(){
		return $this->phone;
	}

    /**
     * @return string
     */
    public function getLastActive(){
		return $this->lastActive;
	}

    /**
     * @return int
     */
    public function getId(){
		return $this->id;
	
	}
    /**
     *
     */
    public function index(){
        echo "User/index";
    }

    /**
     * @return bool
     */
    public function addUser()
    {
		if (Model::checkEmail($this->email) && Model::checkLetters($this->name) && Model::checkPhone($this->phone) && Model::checkPass($this->pass)) {

            /********************************/ 			  // XSS mitigation part

                //<-!xXx>360NoScopE<xXx!->@email.com

            /********************************/

            $stmt = $this->databaseConnection->prepare("INSERT INTO users(name, password, email, phone, lastActive) VALUES (:name, :pwd, :email, :phone, :lastActive)");
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':pwd', $this->pass);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':lastActive', $this->lastActive);

            /**
            *check is user name and email already exist
            */

            $stmt->execute();
            return true;

		} else {
			return false;
		}
	}

    /**
     * @param $id
     * @return User
     */
    public function findUserById($id){
      $id = intval($id);
      $req = $this->databaseConnection->prepare('SELECT * FROM users WHERE id = :id');
      $req->execute(array('id' => $id));
      $user= $req->fetch();
      return new User($user['id'], $user['username'], $user['email'],$user['password'],$user['phonenumber'],$user['date']);  
    }

    /**
     * Todo remove static
     * @param $email
     * @param $password
     * @return bool
     */
    public static function authenticate($email, $password){
      $req = Db::getInstance()->prepare('SELECT email,password FROM users WHERE email = :email');
      $req->execute(array('email' => $email));
      $user= $req->fetch();
        if(password_verify($password,$user['password'])){
            return true;
        }
         return false;

    
    }
}
