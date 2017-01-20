<?php
class Message extends Model{
	
	private $comment;

	public function __construct($id = o, $comment = ''){
		$this->id = $id;
		$this->comment = $comment;

	}
	
	public function insertMessage($message, $today){
		$db = Db::getInstance();
		
		/********************************/ 			  // XSS mitigation part
		$strippedMessage= Model::stripTags($message); //strip HTML tags from message 
		
		/********************************/
		
		$stmt = $db->prepare("INSERT INTO comments(comment, postDate) VALUES (:comment, :date)");

		$stmt->bindParam(':comment', $strippedMessage);
		$stmt->bindParam(':date', $today);
		
		return $stmt->execute();
	}
	
	public function deleteMessage($id){
		$db = Db::getInstance();
		
		
		/********************************/ 	// XSS mitigation part
		$strippedId= Model::stripTags($id); //strip HTML tags from message 
		
		/********************************/
		
		$stmt = $db->prepare("DELETE FROM comments WHERE id = :id");
		
		$stmt->bindParam(':id', $strippedId);
		return $stmt->execute();
		
		
	}
	
}
