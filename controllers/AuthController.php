<?PHP

class AuthController {

// принимаем данные авторизации и перенаправляет в кабинет если пароль и маил указаны правильно     
public function actionAuthorisation()
{
    if (isset($_POST['mail']) && isset($_POST['pass'])) 
    {
        $mail = strip_tags($_POST['mail']);
        $pass = strip_tags($_POST['pass']);

        $DATA['USER'] = Auth::getAuthorisation($mail, $pass);
        if(isset($DATA['USER']->UID))
            {

            $_SESSION['UID']   = $DATA['USER']->UID;
            
            header ("location: /user");
            return true;

            }
            else
            {
            header('location:/exit');
            return true;
            }    
    }

    if($_SESSION['UID'] > 0){
            header ("location: /user");
            return true;
            }
            else
            {
            header('location:/exit');
            return true;
            }   

}


// регистрация нового пользователя проверка свободного майла        
public function actionRegistration() 
{

if (!empty($_POST['mail']) && !empty($_POST['pass'])  && !empty($_POST['name'])  && !empty($_POST['lastname']) && !empty($_POST['tel'])) 
    {

        $mail       = strip_tags($_POST['mail']);
        $pass       = strip_tags($_POST['pass']);
        $name       = strip_tags($_POST['name']); 
        $lastname   = strip_tags($_POST['lastname']);
        $tel        = strip_tags($_POST['tel']);


        $REPLY = Auth::getRegistration($mail, $pass, $name, $lastname, $tel);
        if($REPLY === 'MAILNOTBASY')
            {
            $reportMsg = 12;
            require_once (ROOT.'/views/report.php');    
            return true;    
            }
        if($REPLY === 'MAILBASY')
            {
            $reportMsg = 13;
            require_once (ROOT.'/views/report.php');    
            return true; 
            }    
        }
        else
        {
            $reportMsg = 14;
            require_once (ROOT.'/views/report.php');    
            return true; 
        }

}

// принимаем данные авторизации и перенаправляет в кабинет если пароль и маил указаны правильно 
public function actionAdministration()
{
    if (isset($_POST['mail']) && isset($_POST['pass'])) 
    {
        $mail = strip_tags($_POST['mail']);
        $pass = strip_tags($_POST['pass']);

        $DATA['USER'] = Auth::getAdministration($mail, $pass);
        if(isset($DATA['USER']->UID))
            {

            $_SESSION['UID']   = $DATA['USER']->UID;
            
            header ("location: /admin/0");
            return true;

            }
            else
            {
            header('location:/exit');
            return true;
            }    
    }

    if($_SESSION['UID'] > 0){
            header ("location: /admin/0");
            return true;
            }
            else
            {
            header('location:/exit');
            return true;
            }   

}
        
        
// выход из системы            
public function actionExit(){
    
    unset($_SESSION['UID']);
    require_once (ROOT.'/views/enter/authorisation.php');
            
    return true;    
    }
        



}

