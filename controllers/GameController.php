<?PHP
class GameController {
    
    
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
    
public function actionStart(){

    $UID = intval($_SESSION['UID']);
    
    $PRIZE_TYPE   = Game::getType();
    $PRIZE        = Game::getPrize($PRIZE_TYPE);
    
    if($PRIZE_TYPE !== 'pr_bonus'){
    if($PRIZE->initial_quantity === $PRIZE->played_quantity){header('location: /start/game'); exit;}
    }
    
    $ACTIONS_ADD = Game::getInsActions($PRIZE_TYPE, $PRIZE->ID, $UID); 
       
    header('location: /user'); exit;
    return true;    
} 

public function actionBonus(){

    $UID = intval($_SESSION['UID']);
    
    $PRIZE_TO_BONUS   = Game::getBonus($UID);
       
    header('location: /user'); exit;
    return true;    
} 


}