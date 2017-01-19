<?php 

class MessageController extends Controller
{
	
	public function __construct(){
	}
		
	public function index(){
			
			Controller::view('message/index');
		}	
	public function sendmessage(){
		$comment = $_POST["comment"];
		$today = date("Y-m-d H:i:s");   
		$messagesended = Message::insertMessage($comment, $today);
		echo $comment;
	}

}
