<?PHP
class UserController {
    
    
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
    
public function actionCabinet(){

    $UID = intval($_SESSION['UID']);
    
    $INFO_USER      = User::infoUser($UID);
    $INFO_GAME      = User::infoGame($UID);
    if(!empty($INFO_GAME->PRIZE_ID)){$INFO_PRIZE = User::infoPrize($INFO_GAME->PRIZE_ID, $INFO_GAME->pr_name);}else{$INFO_PRIZE = false;}
       
    require_once (ROOT.'/views/user/main.php'); 
    return true;    
} 


}