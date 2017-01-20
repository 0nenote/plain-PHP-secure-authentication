<?php 

class MessageController extends Controller
{
	
	public function __construct(){
	}
		
	public function index(){
			
			Controller::view('message/index');
		}	
		
		

	
	public function sendMessage(){
		
	
		
		switch(Controller::validateInput()){
			
			case 1 :
				$comment = $_POST["comment"];
				$today = date("Y-m-d H:i:s");   
				$messageSended = Message::insertMessage($comment, $today);
			
					if($messageSended){
						echo "message added successfully";
					}
					else {
						echo "message was not added";
					}
					
				break;
			
			case 2: 
				echo "captcha was not checked";
				break;
			
			case 3:
				echo "captcha is missing from site";
				break;
			
			default:
				echo "unknown error";
			
		}
		
	}
	
	public function deleteMessage($id){
			
		$messageDeleted = Message::deleteMessage($id);
		
		if($messageDeleted){
			echo "message deleted successfully";
		}
		else{
			echo "message was not deleted";
		}
	
				
	}

}
