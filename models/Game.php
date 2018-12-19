<?php
class Game
{
    
public static function getType(){
    $db = Db::getConnection();
    $type = array();

    $stmt_fr_money = $db -> prepare("SELECT SUM(`frequency`) AS `FR_MONEY` FROM `pr_money`"); 
    $stmt_fr_money -> execute(); 
    $fr_money = $stmt_fr_money -> fetch(PDO::FETCH_OBJ)->FR_MONEY;
    
    $stmt_fr_things = $db -> prepare("SELECT SUM(`frequency`) AS `FR_THINGS` FROM `pr_things`"); 
    $stmt_fr_things -> execute(); 
    $fr_things = $stmt_fr_things -> fetch(PDO::FETCH_OBJ)->FR_THINGS;
    
    $stmt_fr_bonus = $db -> prepare("SELECT SUM(`frequency`) AS `FR_BONUS` FROM `pr_bonus`"); 
    $stmt_fr_bonus -> execute(); 
    $fr_bonus = $stmt_fr_bonus -> fetch(PDO::FETCH_OBJ)->FR_BONUS;
    
    for($i = 0; $i < $fr_money;   $i++) {$type[] = 'pr_money';}
    for($i = 0; $i < $fr_things;  $i++) {$type[] = 'pr_things';}
    for($i = 0; $i < $fr_bonus;   $i++) {$type[] = 'pr_bonus';}
    
    shuffle($type);
    $rand = rand(0, (count($type)-1));
    
    $select_type = ($type[$rand]);
       

    return $select_type;  
}

public static function getPrize($PRIZE_TYPE){
    $db = Db::getConnection();
    $type = array();
    
    
    
    if($PRIZE_TYPE == 'pr_money' || $PRIZE_TYPE == 'pr_things' || $PRIZE_TYPE == 'pr_bonus'){$PR_TABLE = "$PRIZE_TYPE";}else{exit;}
    
    $stmt_prize_all = $db -> prepare("SELECT `ID`, `frequency` FROM `$PR_TABLE`");
       
    $stmt_prize_all -> execute();
    
    while($rows_prize = $stmt_prize_all->fetch(PDO::FETCH_OBJ)){
    
    for($i = 0; $i < $rows_prize->frequency;   $i++) {$type[] = $rows_prize->ID;}
    
    }
    
    shuffle($type);
    $rand = rand(0, (count($type)-1));   
    $select_prize = ($type[$rand]);
    
    $stmt_prize = $db -> prepare("SELECT * FROM `$PR_TABLE` WHERE `ID` = ?");

    $stmt_prize -> bindValue(1,$select_prize,   PDO::PARAM_INT);
    
    $stmt_prize -> execute();
    
    $prize = $stmt_prize->fetch(PDO::FETCH_OBJ);
    
return $prize;       

}


public static function getInsActions($PRIZE_TYPE, $PRIZE_ID, $UID){
$db = Db::getConnection();

    $stmt_check_rec = $db -> prepare("SELECT `UID`  FROM `actions_history` WHERE `UID` = ?"); 
    $stmt_check_rec ->bindValue(1, $UID, PDO::PARAM_INT);
    $stmt_check_rec -> execute(); 
    
    if(empty($stmt_check_rec -> fetch(PDO::FETCH_OBJ))){
        
        $stmt_act_ins = $db -> prepare("INSERT INTO `actions_history` (`UID`, `PRIZE_ID`, `pr_name`) VALUES(?,?,?)");

        $stmt_act_ins ->bindValue(1, $UID,          PDO::PARAM_INT);
        $stmt_act_ins ->bindValue(2, $PRIZE_ID,     PDO::PARAM_INT);
        $stmt_act_ins ->bindValue(3, $PRIZE_TYPE,   PDO::PARAM_STR);


        $stmt_act_ins ->execute();
        
        
        
        if($PRIZE_TYPE == 'pr_money' || $PRIZE_TYPE == 'pr_things' || $PRIZE_TYPE == 'pr_bonus'){$PR_TABLE = "$PRIZE_TYPE";}else{exit;}
        
        if($PRIZE_TYPE == 'pr_things'){      
        $stmt_prize_up = $db -> prepare("UPDATE `pr_things` SET `played_quantity` = `played_quantity`+1 WHERE `ID` = ?");
        $stmt_prize_up ->bindValue(1, $PRIZE_ID, PDO::PARAM_INT);
        $stmt_prize_up -> execute();
        }
        
        if($PRIZE_TYPE == 'pr_money'){      
        $stmt_prize_up = $db -> prepare("UPDATE `pr_money` SET `played_quantity` = `played_quantity`+`name` WHERE `ID` = ?");
        $stmt_prize_up ->bindValue(1, $PRIZE_ID, PDO::PARAM_INT);
        $stmt_prize_up -> execute();
        }
        
        
        if($PRIZE_TYPE == 'pr_bonus'){      
        $stmt_prize_up = $db -> prepare("UPDATE `pr_bonus` SET `played_quantity` = `played_quantity`+`name` WHERE `ID` = ?");
        $stmt_prize_up ->bindValue(1, $PRIZE_ID, PDO::PARAM_INT);
        $stmt_prize_up -> execute();
        }
        
    }
    
}


public static function getBonus($UID){
$db = Db::getConnection();

    $stmt_act = $db -> prepare("SELECT *  FROM `actions_history` WHERE `UID` = ?"); 
    $stmt_act ->bindValue(1, $UID, PDO::PARAM_INT);
    $stmt_act -> execute();
    
    $action = $stmt_act -> fetch(PDO::FETCH_OBJ);
    
    if(!empty($action->UID)){
        
        $INFO_PRIZE = User::infoPrize($action->PRIZE_ID, $action->pr_name);
        
        print_r($INFO_PRIZE);
        
        $stmt_act_ins = $db -> prepare("UPDATE `actions_history` SET `pr_name` = ?, `PRIZE_ID` = ?, `change_name` = ?, `bonus_equivalent` = ? WHERE  `UID` = ?");

        $stmt_act_ins ->bindValue(1, 'pr_bonus',                    PDO::PARAM_STR);
        $stmt_act_ins ->bindValue(2, $INFO_PRIZE->ID,               PDO::PARAM_INT);
        $stmt_act_ins ->bindValue(3, $action->pr_name,              PDO::PARAM_STR);
        $stmt_act_ins ->bindValue(4, $INFO_PRIZE->bonus_equivalent, PDO::PARAM_STR);
        $stmt_act_ins ->bindValue(5, $UID,                          PDO::PARAM_STR);


        $stmt_act_ins ->execute();
        
   
        
    }
    
}

}