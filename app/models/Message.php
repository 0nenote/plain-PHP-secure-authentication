<?php
class Message extends Model{
	
	private $comment;

	public function __construct($id = o, $comment = ''){
		$this->id = $id;
		$this->comment = $comment;

	}
	
	public function insertMessage($message, $today){
		$db = Db::getInstance();
		$stmt = $db->prepare("INSERT INTO comments(comment, date) VALUES (:comment, :date)");

		$stmt->bindParam(':comment', $message);
		$stmt->bindParam(':date', $today);
		$stmt->execute();
	}
	
	public function deleteMessage($id){
		// coger el id y comprar con la table y después borrarlo
	}
	
}
