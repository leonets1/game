<?php
class Game
{
 
// выбираем тип приза случайным методом основываясь на указанной в базе желаемой частоте выпадания    
public static function getType(){
    $db = Db::getConnection();
    $type = array();

    // считаем общее количество частоты выпадения конкретного типа приза
    $stmt_fr_money = $db -> prepare("SELECT SUM(`frequency`) AS `FR_MONEY` FROM `pr_money`"); 
    $stmt_fr_money -> execute(); 
    $fr_money = $stmt_fr_money -> fetch(PDO::FETCH_OBJ)->FR_MONEY;
    
    // считаем общее количество частоты выпадения конкретного типа приза
    $stmt_fr_things = $db -> prepare("SELECT SUM(`frequency`) AS `FR_THINGS` FROM `pr_things`"); 
    $stmt_fr_things -> execute(); 
    $fr_things = $stmt_fr_things -> fetch(PDO::FETCH_OBJ)->FR_THINGS;
    
    // считаем общее количество частоты выпадения конкретного типа приза
    $stmt_fr_bonus = $db -> prepare("SELECT SUM(`frequency`) AS `FR_BONUS` FROM `pr_bonus`"); 
    $stmt_fr_bonus -> execute(); 
    $fr_bonus = $stmt_fr_bonus -> fetch(PDO::FETCH_OBJ)->FR_BONUS;
    
    // записываем в массив  названия типов призов основываясь на суммированой частоте выпадания 
    for($i = 0; $i < $fr_money;   $i++) {$type[] = 'pr_money';}
    for($i = 0; $i < $fr_things;  $i++) {$type[] = 'pr_things';}
    for($i = 0; $i < $fr_bonus;   $i++) {$type[] = 'pr_bonus';}
    
    // смешиваем массив
    shuffle($type);
    // получаем случайное число не большее чем количесвто элементов в массиве
    $rand = rand(0, (count($type)-1));
    
    // выбираем тип приза из смешанного массива случайным числом
    $select_type = ($type[$rand]);
       

    return $select_type;  
}

// принимаем тип приза и основываясь на частоте выпадания призов в конкретной базе для этого типа, разыгрываем приз 
public static function getPrize($PRIZE_TYPE){
    $db = Db::getConnection();
    $type = array();
    
    
    // проверяем чтоб имя базы было допустимым
    if($PRIZE_TYPE == 'pr_money' || $PRIZE_TYPE == 'pr_things' || $PRIZE_TYPE == 'pr_bonus'){$PR_TABLE = "$PRIZE_TYPE";}else{exit;}
    
    // выбираем все варианты призов из конкретной базы призов одноименной с названием типа призов
    $stmt_prize_all = $db -> prepare("SELECT `ID`, `frequency` FROM `$PR_TABLE`");     
    $stmt_prize_all -> execute();
    
    // делаем цикл чтоб все призы внести в массив
    while($rows_prize = $stmt_prize_all->fetch(PDO::FETCH_OBJ)){
    
    // делаем второй цикл чтоб все призы внести в массив с учетом указанной в базе желаемой частоты выпадания
    for($i = 0; $i < $rows_prize->frequency;   $i++) {$type[] = $rows_prize->ID;}
    
    }
    
    // смешиваем массив
    shuffle($type);
    // получаем случайное число не большее чем количесвто элементов в массиве
    $rand = rand(0, (count($type)-1));   
    
    // выбираем приз из смешанного массива случайным числом
    $select_prize = ($type[$rand]);
    
    // делаем выборку из базы чтоб получить детальную информацию о призе
    $stmt_prize = $db -> prepare("SELECT * FROM `$PR_TABLE` WHERE `ID` = ?");

    $stmt_prize -> bindValue(1,$select_prize,   PDO::PARAM_INT);
    
    $stmt_prize -> execute();
    
    $prize = $stmt_prize->fetch(PDO::FETCH_OBJ);
    
return $prize;       

}

// запись действия о розыгрыше приза 
public static function getInsActions($PRIZE_TYPE, $PRIZE_ID, $UID){
$db = Db::getConnection();

// проверяем если записи конкретного пользователя нет можно разыграть приз и сделать запись
    $stmt_check_rec = $db -> prepare("SELECT `UID`  FROM `actions_history` WHERE `UID` = ?"); 
    $stmt_check_rec ->bindValue(1, $UID, PDO::PARAM_INT);
    $stmt_check_rec -> execute(); 
    
    if(empty($stmt_check_rec -> fetch(PDO::FETCH_OBJ))){
        
        $stmt_act_ins = $db -> prepare("INSERT INTO `actions_history` (`UID`, `PRIZE_ID`, `pr_name`) VALUES(?,?,?)");

        $stmt_act_ins ->bindValue(1, $UID,          PDO::PARAM_INT);
        $stmt_act_ins ->bindValue(2, $PRIZE_ID,     PDO::PARAM_INT);
        $stmt_act_ins ->bindValue(3, $PRIZE_TYPE,   PDO::PARAM_STR);


        $stmt_act_ins ->execute();
        
        
        // проверяем чтоб имя базы было допустимым
        if($PRIZE_TYPE == 'pr_money' || $PRIZE_TYPE == 'pr_things' || $PRIZE_TYPE == 'pr_bonus'){$PR_TABLE = "$PRIZE_TYPE";}else{exit;}
        
        // обновляем запись о количестве разыгранных призов непосредственно в базе и поле конкретного вида  приза который был разыгран
        if($PRIZE_TYPE == 'pr_things'){      
        $stmt_prize_up = $db -> prepare("UPDATE `pr_things` SET `played_quantity` = `played_quantity`+1 WHERE `ID` = ?");
        $stmt_prize_up ->bindValue(1, $PRIZE_ID, PDO::PARAM_INT);
        $stmt_prize_up -> execute();
        }
        // обновляем запись о количестве разыгранных призов непосредственно в базе и поле конкретного вида  приза который был разыгран
        if($PRIZE_TYPE == 'pr_money'){      
        $stmt_prize_up = $db -> prepare("UPDATE `pr_money` SET `played_quantity` = `played_quantity`+`name` WHERE `ID` = ?");
        $stmt_prize_up ->bindValue(1, $PRIZE_ID, PDO::PARAM_INT);
        $stmt_prize_up -> execute();
        }
        // обновляем запись о количестве разыгранных призов непосредственно в базе и поле конкретного вида  приза который был разыгран
        if($PRIZE_TYPE == 'pr_bonus'){      
        $stmt_prize_up = $db -> prepare("UPDATE `pr_bonus` SET `played_quantity` = `played_quantity`+`name` WHERE `ID` = ?");
        $stmt_prize_up ->bindValue(1, $PRIZE_ID, PDO::PARAM_INT);
        $stmt_prize_up -> execute();
        }
        
    }
    
}

// обмениваем выигранный приз на бонусы эквивалентные призам, эквиваленты указаны в базе с наименованием конкретного вида приза
public static function getBonus($UID){
$db = Db::getConnection();

// выбираем разыграны для пользователя приз 
    $stmt_act = $db -> prepare("SELECT *  FROM `actions_history` WHERE `UID` = ?"); 
    $stmt_act ->bindValue(1, $UID, PDO::PARAM_INT);
    $stmt_act -> execute();
    
    
    $action = $stmt_act -> fetch(PDO::FETCH_OBJ);
    
    if(!empty($action->UID)){
        
        // выбираем детальную информацию о разыграном призе
        $INFO_PRIZE = User::infoPrize($action->PRIZE_ID, $action->pr_name);
        
        // обновляем информацию о разыграном призе и переносим старой информации в соседнее поле в записи созданное для этого
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