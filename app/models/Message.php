<?php

/**
 * Class Message
 */
class Message extends Model
{
    /**
     * @var string
     */
    private $id;
    private $comment;
    private $date_added;

    /**
     * Message constructor.
     * @param int $id
     * @param string $comment
     */
    public function __construct()
    {
        parent::__construct();//Call the parent constructor
	}

    /**
     * @param $message
     * @param $today
     * @return bool
     */
    public function insertMessage($message, $today)
    {
		/********************************/ 			  // XSS mitigation part
		$strippedMessage= Model::stripTags($message);
		$espacedMessage = Model::outputEscape($strippedMessage);//strip HTML tags from message
		/********************************/
		$encrypted_message = $this->encryptMessage($espacedMessage);
        
		$stmt = $this->databaseConnection->prepare("INSERT INTO comments(comment, postDate,users_id) VALUES (:comment, :date, :user_id)");

		$stmt->bindParam(':comment', $encrypted_message);
		$stmt->bindParam(':date', $today);
        //TODO Change to active user
        $uId = $_SESSION['user']['id'];
        $stmt->bindParam(':user_id', $uId);
		
		return $stmt->execute();
	}
    
    public function getMessages($user_id){
        $db = Db::getInstance();
		$stmt = $db->prepare("SELECT id, comment, postDate as date_added FROM comments WHERE users_id = :id");
		$stmt->bindParam(':id', $user_id);
        $stmt->execute();  
        $messages = $stmt->fetchAll(PDO::FETCH_CLASS, 'Message');
    
        return $messages;
    }
    
    public function encryptMessage($message){
        $encryptionKey = parse_ini_file('../config/app.ini');
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($message, 'aes-256-cbc', $encryptionKey['message_key'], 0, $iv);
        
        return base64_encode($encrypted . '::' . $iv );
    }
    
    public function decryptMessage($message){
    $encryptionKey = parse_ini_file('../config/app.ini');
    list($encrypted_message, $iv) = explode('::', base64_decode($message), 2);
    return openssl_decrypt($encrypted_message, 'aes-256-cbc',
                           $encryptionKey['message_key'], 0, $iv);
    }
        
    public function getMessage(){
        
        return $this->decryptMessage($this->comment);
    }
    
    public function getDateAdded(){
        return $this->date_added;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteMessage ($id)
    {
		/********************************/ 	// XSS mitigation part
		$strippedId= Model::stripTags($id); //strip HTML tags from message 
		/********************************/
		
		$stmt = $this->databaseConnection->prepare("DELETE FROM comments WHERE id = :id");
		
		$stmt->bindParam(':id', $strippedId);

		return $stmt->execute();
	}
	
}
