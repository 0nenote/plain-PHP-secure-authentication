<?php

/**
 * Class Model
 */
class Model {

    protected $databaseConnection;

    public function __construct ()
    {
        $this->databaseConnection = Db::getInstance();
    }

    /**
     * @param $data
     * @return string
     */
    protected function stripTags($data)
	{
		return strip_tags($data); //strip every HTML tag
	}

    /**
     * @param $data
     * @return string
     */
    protected function outputEscape($data){
		return htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); //output escaping
	}

    /**
     * @param $data
     * @return bool
     */
    protected function checkLetters($data){
		if(preg_match("/^[a-zA-Z ]*$/",$data)){ //check if only letters from a-z A-Z are used
			return true;
		}
		else{
			return false;
		}
		
	}

    /**
     * @param $data
     * @return bool
     */
    protected function checkLettersAndNumbers($data){
		if(preg_match('/^[a-zA-Z0-9]+$/', $data)){ //check if only letters from a-z A-Z and numbers are used
			return true;
		}
		else{
			return false;
		}
		
	}


    /**
     * @param $data
     * @return bool
     */
    protected function checkEmail($data){
		if(filter_var($data, FILTER_VALIDATE_EMAIL)){ //check if valid email
		
			return true;
		}
		else{
			echo 'Invalid Email';
			return false;
		}
		
	}

    /**
     * @param $data
     * @return bool
     */
    protected function checkPhone($data){ //check if valid phone number
    
		$numbersOnly = preg_replace("[^0-9]", "", $data);
		$numberOfDigits = strlen($numbersOnly);
			if ($numberOfDigits == 7 or $numberOfDigits == 10) {
			
			return true;
		} 
		else {
			echo 'Invalid Phone Number';
			return false;
		}
	}

    /**
     * @param $data
     * @return bool
     */
    protected function checkPass($data){
	    if (strlen($data) <= '8') {
             echo "Your Password Must Contain At Least 8 Characters!";
			return false;
        }
        else if(!preg_match("#[0-9]+#",$data)) {
            echo "Your Password Must Contain At Least 1 Number!";
			return false;
        }
        else if(!preg_match("#[A-Z]+#",$data)) {
            echo "Your Password Must Contain At Least 1 Capital Letter!";
			return false;
        }
        else if(!preg_match("#[a-z]+#",$data)) {
            echo "Your Password Must Contain At Least 1 Lowercase Letter!";
			return false;
        } else {
           
			return true;
        }
	}

	
	
}
