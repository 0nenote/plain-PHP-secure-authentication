<?php

/**
 * Class MessageController
 */
class MessageController extends Controller
{
    /**
     * @var null
     */
  //  private $message = null;
    private $messageList;
    /**
     * MessageController constructor.
     */
    public function __construct ()
    {
        
         require_once('user_controller.php');
          if (isset($_SESSION['user'])) {
            $this->message = new Message($_SESSION['user']['id'],'','');
            return;
        }
      
     
    }

    /**
     * the index controller
     */
    public function index()
    {
           if (!isset($_SESSION['user'])) {
           	$this->view('/login/index');
            return;
        } else{
               	$this->view('message/index');
           }
		
    }

    public function getAllMessages(){
        //The id should come from the session
        //Set to 1 for now
        //Fetching all messages from the user to pass to the view
        return $this->message->getMessages($_SESSION['user']['id']);
    }


    /**
     * The controller used to send messages
     */
    public function sendMessage(){
          $error = false;
		switch ($this->validateInput()) {
			//TODO pass error message to error view
          
			case 1 :
				$comment = $_POST["comment"];
				$today = date("Y-m-d H:i:s");
               
				if (!$this->message->insertMessage($comment, $today)) {
						 $error = true;
					} 
	    	    break;
			case 2: 
				 $error = true;
				break;
			case 3:
					 $error = true;
				break;
			default:
				 $error = true;
			
		}
         $this->view('message/index');
        if($error){
             $this->view('error/index');
        } else{
            $this->view('success/index');
        }
          
	}

    /**
     * @param $id
     */
    public function deleteMessage($id)
    {
		if ($this->message->deleteMessage($id)) {
			echo "message deleted successfully";
		} else {
			echo "message was not deleted";
		}
	}

}
