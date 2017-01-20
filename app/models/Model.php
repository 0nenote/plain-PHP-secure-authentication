<?php
class Model {

	
	public function stripTags($data)
	{
		return strip_tags($data); //strip every HTML tag
	}
	
	public function outputEscape($data){
		return htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); //output escaping
	}
	
	public function checkLetters($data){
		if(preg_match("/^[a-zA-Z ]*$/",$data)){ //check if only letters from a-z A-Z are used
			return true;
		}
		else{
			return false;
		}
		
	}
	
	public function checkLettersAndNumbers($data){
		if(preg_match('/^[a-zA-Z0-9]+$/', $data)){ //check if only letters from a-z A-Z and numbers are used
			return true;
		}
		else{
			return false;
		}
		
	}
	
	
	public function checkEmail($data){
		if(filter_var($data, FILTER_VALIDATE_EMAIL)){ //check if valid email
		
			return true;
		}
		else{
			echo 'Invalid Email';
			return false;
		}
		
	}
	public function checkPhone($data){ //check if valid phone number
    
		$numbersOnly = ereg_replace("[^0-9]", "", $data);
		$numberOfDigits = strlen($numbersOnly);
			if ($numberOfDigits == 7 or $numberOfDigits == 10) {
			
			return true;
		} 
		else {
			echo 'Invalid Phone Number';
			return false;
		}
	}
	
	public function checkPass($data){
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
