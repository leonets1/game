<?PHP
class GameController {
    
// если пользователь не авторизован перекинуть на страницу авторизации    
function __construct(){
    if(!empty($_SESSION["UID"]) && $_SESSION["UID"] > 0 )
    {   
    $UID = intval($_SESSION['UID']);
    }
    else{
        header('location:/exit');
        return true;    
        }
           
}

// нажата кнопка разыгрывания приза 
public function actionStart(){

    $UID = intval($_SESSION['UID']);
    
    // разыгрываем тип приза 
    $PRIZE_TYPE   = Game::getType();
    // отдаем тип приза и разыгрываем конкретный вид приза из нескольких доступных пример: ноутбук, планшет плеер...
    $PRIZE        = Game::getPrize($PRIZE_TYPE);
    
    // если допустимое количество конретного приза (ноутбук, планшет плеер...) равняется разыгранному количству
    // то повторять цикл розыгрыша заново пока не будет разыгран доступный приз 
    if($PRIZE_TYPE !== 'pr_bonus'){
    if($PRIZE->initial_quantity === $PRIZE->played_quantity){header('location: /start/game'); exit;}
    }
    
    // если приз разыгран записать информацию о розыгрыше
    $ACTIONS_ADD = Game::getInsActions($PRIZE_TYPE, $PRIZE->ID, $UID); 
       
    header('location: /user'); exit;
    return true;    
} 

// обменять приз на бонусы 
public function actionBonus(){

    $UID = intval($_SESSION['UID']);
    
    $PRIZE_TO_BONUS   = Game::getBonus($UID);
       
    header('location: /user'); exit;
    return true;    
} 


}