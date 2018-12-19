<?PHP

class MainController {
    
public function actionIndex() 
{
    require_once (ROOT.'/views/enter/authorisation.php');
    return true;    
}

public function actionAdministration() 
{
    require_once (ROOT.'/views/enter/administration.php');
    return true;    
}
 

public function actionExit()
        {
        unset($_SESSION['UID']);
        header ("location: authorisation/user");
        return true;    
        }
       
public function actionReport($RID)
        {
        $reportMsg = $RID;
        require_once (ROOT.'/views/report.php'); 
        return true;    
        }
    
    
}

