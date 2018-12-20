<?php
class Admin
{
 // информация об администраторе    
public static function infoAdmin($UID){
    $db = Db::getConnection();
        
    $stmt = $db -> prepare("SELECT * FROM `admin` WHERE `UID` = ? ");
    $stmt -> bindValue(1,$UID, PDO::PARAM_INT);
    $stmt -> execute();
    $st = $stmt -> fetch(PDO::FETCH_OBJ);

    return $st;  
}

}