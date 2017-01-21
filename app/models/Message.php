<?php

/**
 * Class Message
 */
class Message extends Model
{
    /**
     * @var string
     */
    private $comment;

    /**
     * Message constructor.
     * @param int $id
     * @param string $comment
     */
    public function __construct($id = 0, $comment = '')
    {
		$this->id = $id;
		$this->comment = $comment;
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
		$strippedMessage= Model::stripTags($message); //strip HTML tags from message
		/********************************/
		
		$stmt = $this->databaseConnection->prepare("INSERT INTO comments(comment, postDate) VALUES (:comment, :date)");

		$stmt->bindParam(':comment', $strippedMessage);
		$stmt->bindParam(':date', $today);
		
		return $stmt->execute();
	}
    
    public function getMessages($user){
        $db = Db::getInstance();
		$stmt = $db->prepare("SELECT comment, date FROM comments WHERE users_id = :id");
		$stmt->bindParam(':id', $strippedId);
		 $stmt->execute();  
        return $sth->fetchAll();
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
