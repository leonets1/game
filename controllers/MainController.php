<?PHP

class MainController {

// главная страница 
// в данном случае используется для вызова страницы авторизации пользователя    
public function actionIndex() 
{
    require_once (ROOT.'/views/enter/authorisation.php');
    return true;    
}

// вызов страницы авторизации администратора
public function actionAdministration() 
{
    require_once (ROOT.'/views/enter/administration.php');
    return true;    
}
 
// выход из системы 
public function actionExit()
        {
        unset($_SESSION['UID']);
        header ("location: authorisation/user");
        return true;    
        }

// вызов разного вида служебных сообщений      
public function actionReport($RID)
        {
        $reportMsg = $RID;
        require_once (ROOT.'/views/report.php'); 
        return true;    
        }
    
    
}

