<?php

/**
 * Class MessageController
 */
class MessageController extends Controller
{
    /**
     * @var null
     */
    private $message = null;

    /**
     * MessageController constructor.
     */
    public function __construct ()
    {
        $this->message = new Message();
    }

    /**
     * the index controller
     */
    public function index()
    {
			$this->view('message/index');
    }


    /**
     * The controller used to send messages
     */
    public function sendMessage(){
		switch ($this->validateInput()) {
			
			case 1 :
				$comment = $_POST["comment"];
				$today = date("Y-m-d H:i:s");
					if ($this->message->insertMessage($comment, $today)) {
						echo "message added successfully";
					} else {
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
