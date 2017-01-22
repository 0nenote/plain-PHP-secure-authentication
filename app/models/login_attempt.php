<?php
class LoginAttempt extends Model {
    
     public static function getLoginAttempts($userId,$ip){
      $id = intval($userId);
      $db =  Db::getInstance();
      $sth = $db->prepare('SELECT attempts FROM login_attempt WHERE user_id = ? AND ip = ?');
      $sth->execute(array($id, $ip));
      $attempts = $sth->fetch();
       if($attempts == null){
           $attempts = 0;
       }
        return $attempts;
    }
    
    public static function incrementLoginAttempt($userId,$ip){
        $db =  Db::getInstance();
        if(LoginAttempt::getLoginAttempts($userId,$ip) != 0){
            $sth = $db->prepare(
                "UPDATE login_attempt SET attempts = :attempts");
            $req->execute(array('attempts' => $attempts+1));
            $sth->execute();
        } else{
             $sth = $db->prepare("INSERT INTO login_attempt(ip, attempts, user_id) VALUES (:ip, :attempts, :user_id)");
            $attempt = 1;
            $sth->bindParam(':ip', $ip);
            $sth->bindParam(':user_id', $userId);
            $sth->bindParam(':attempts', $attempt);
            $sth->execute();
        }
    }
    
    
    public static function resetLoginAttempts($userId,$ip){
         $db =  Db::getInstance();
      $id = intval($userId);
      $sth = $db->prepare('DELETE FROM login_attempt WHERE user_id = ? AND ip = ?');
      $sth->execute(array($id, $ip));

      $sth->execute(); 
    }

}