<?PHP
class AdminController {
    
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

// начальная страница администрирования 
public function actionCabinet($CURR_PAGE = 1){

    $UID = intval($_SESSION['UID']);
    
    $INFO      = Admin::infoAdmin($UID);
       
    require_once (ROOT.'/views/admin/main.php'); 
    return true;    
} 



}