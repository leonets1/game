<?php
class Auth
{
    
 // вход в систему         
public static function getAuthorisation($mail, $pass)
    {
        $db = Db::getConnection();
        
        $stmt = $db -> prepare("SELECT * FROM `users` WHERE `Mail` = ? AND `Pass` = ? AND `Mail` != ?");
        $stmt ->bindValue(1, $mail, PDO::PARAM_STR);
        $stmt ->bindValue(2, $pass, PDO::PARAM_STR);
        $stmt ->bindValue(3, '',    PDO::PARAM_STR);
        $stmt ->execute();

        $st = $stmt->fetch(PDO::FETCH_OBJ);

        return $st;  
    }  
    
   
 // регистрация нового пользователя с проверкой эл .почты   
public static function getRegistration($mail, $pass, $name, $lastname, $tel)
    {
        
            $db = Db::getConnection();
       
            $result = $db -> prepare("SELECT * FROM `users` WHERE `Mail` = ?");
            $result -> bindValue(1, $mail, PDO::PARAM_STR);
            $result -> execute();
            
            $userCheck = $result->fetch(PDO::FETCH_OBJ);
            
            $fullDate = date('Y:m:d G:i:s');
           
            if(!isset($userCheck->UID))
            {
            $stmt_user_ins = $db -> prepare("INSERT INTO `users` (`Name`, `lastName`, `Mail`, `Pass`, `Tel`,`Date`) VALUES(?,?,?,?,?,?)");
            
            $stmt_user_ins -> bindValue(1, $name,       PDO::PARAM_STR);
            $stmt_user_ins -> bindValue(2, $lastname,   PDO::PARAM_STR);
            $stmt_user_ins -> bindValue(3, $mail,       PDO::PARAM_STR);
            $stmt_user_ins -> bindValue(4, $pass,       PDO::PARAM_STR);
            $stmt_user_ins -> bindValue(5, $tel,        PDO::PARAM_STR);
            $stmt_user_ins -> bindValue(6, $fullDate,   PDO::PARAM_STR);
            
            $stmt_user_ins ->execute();
            
            return $userRegistration = 'MAILNOTBASY';
            }
            
            if(isset($userCheck->UID))
            {
            return $userRegistration = 'MAILBASY';
            }

            
    }
    
    
// вход администратора     
public static function getAdministration($mail, $pass)
    {
        $db = Db::getConnection();
        
        $stmt = $db -> prepare("SELECT * FROM `admin` WHERE `Mail` = ? AND `Pass` = ? AND `Mail` != ?");
        $stmt ->bindValue(1, $mail, PDO::PARAM_STR);
        $stmt ->bindValue(2, $pass, PDO::PARAM_STR);
        $stmt ->bindValue(3, '',    PDO::PARAM_STR);
        $stmt ->execute();

        $st = $stmt->fetch(PDO::FETCH_OBJ);

        return $st;  
    } 

}