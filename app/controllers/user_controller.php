<?php
class Registration {


	public function addUser($username,$pwd,$email,$phone){
	    $tz_object = new DateTimeZone('Europe/Amsterdam');
		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
		
	
			
		$stmt = $dbh->prepare("INSERT INTO dbe1kmonon1.users (username, password, email, phonenumber, date) VALUES (:name, :pwd, :email, :phone, :date)");
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':pwd', $pwd);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':date', $datetime->format('Y\-m\-d\ h:i:s'));
		
		

		// insert one row
		$name = 'one';
		$value = 1;
		$stmt->execute();
	
	}
	
	
	
	
}
?>