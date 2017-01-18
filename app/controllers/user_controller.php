<?php
class User extends Controller {

	public function addUser($username,$pwd,$email,$phone){
	    
		$tz_object = new DateTimeZone('Europe/Amsterdam');
		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
			
		$stmt = $dbh->prepare("INSERT INTO database (username, password, email, phonenumber, date) VALUES (:name, :pwd, :email, :phone, :date)");
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':pwd', $pwd);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':date', $datetime->format('Y\-m\-d\ h:i:s'));
		
		$stmt->execute();

    public function index(){
        echo "User/index";
    }


}
?>