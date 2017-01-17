<?php
class inputValidator {


	public function stripTags($data)
	{
		return strip_tags($data);
	}
	
	public function outputEscape($data){
		return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
	}
	
}

?>