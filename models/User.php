<?php
class User
{
// информация о пользователе     
public static function infoUser($UID){
    $db = Db::getConnection();
        
    $stmt = $db -> prepare("SELECT * FROM `users` WHERE `UID` = ? ");
    $stmt -> bindValue(1,$UID, PDO::PARAM_INT);
    $stmt -> execute();
    $st = $stmt -> fetch(PDO::FETCH_OBJ);

    return $st;  
}

// информация о произошедшем розыгрыше приза 
public static function infoGame($UID){
    $db = Db::getConnection();
        
    $stmt = $db -> prepare("SELECT * FROM `actions_history` WHERE `UID` = ? ");
    $stmt -> bindValue(1,$UID, PDO::PARAM_INT);
    $stmt -> execute();
    $st = $stmt -> fetch(PDO::FETCH_OBJ);

    return $st;  
}

// информация для детального описания приза
public static function infoPrize($PRIZE_ID, $PRIZE_TYPE){
    $db = Db::getConnection();
    
    // проверяем чтоб имя базы было допустимым
    if($PRIZE_TYPE == 'pr_money' || $PRIZE_TYPE == 'pr_things' || $PRIZE_TYPE == 'pr_bonus'){$PR_TABLE = "$PRIZE_TYPE";}else{exit;}
        
    $stmt = $db -> prepare("SELECT * FROM `$PR_TABLE` WHERE `ID` = ? ");
    $stmt -> bindValue(1,$PRIZE_ID, PDO::PARAM_INT);
    $stmt -> execute();
    $st = $stmt -> fetch(PDO::FETCH_OBJ);

    return $st;  
}

}