<?php

// создаем класс роутера
class Router 
{
    
    // свойство для хранения роутов 
    private $routes;

    //  __construct() - автоматическое подгрузка путей роутов из файла
    function __construct() 
    {
        // прописываем абсолютный путь файлу, контактенируем с константой ROOT
        // загружаем в виде массива все роуты из файла в свойство класса $routes
        $this -> routes = include(ROOT.'/config/routes.php'); 
    }
    
    // внутренний метод проверки и очистки запроса
    private function getURI()
    {
        // проверяем  запрос на существование
        if(!empty($_SERVER['REQUEST_URI']))
        {
           // очищаем от наружных слэшей и возвращаем 
           return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    // основной метод маршрутизатора, формирование и вызов контроллеров и методов контроллеров.
    public function run()
    {
       // вызов метода класса с запросом 
       $uri = $this -> getURI();
       
       // вывод роутов в цикле в виде ключ => значение 
       foreach ($this -> routes as $uriPattern => $path )
       {
          // проверяем есть ли совпадения с ключами роутов ($uriPattern) с пришедшим запросом ($uri)
          // при первом же совпадении цикл останавливается
          if(preg_match("~$uriPattern~", $uri)) 
          {
              // ищем совпадения ключа из роутов ($uriPattern) с пришедшим запросом ($uri)
              // и формируем  новый запрос  из значения роутов ($path)
              $internalRoute = preg_replace("~$uriPattern~", $path, $uri); 
              
              // деление запроса на элементы и запись их в виде массива 
              $segments = explode('/', $internalRoute);
              
              // вырезаем из массива первый элемнт и создаем имя класса контроллера
              // делаем заглавной первую буквы контролера :)
              $controllerName =  ucfirst(array_shift($segments).'Controller');
                           
              // вырезаем второй элемент массива и формируем метод класса
              $actionName = 'action'.ucfirst(array_shift($segments));
              
              // остальные элементы ($segments) будут параметрами которые передадим в соответствующую переменную
              $parameters = $segments;
              
              // формируем абсолютный путь до файла контроллера с одноименным названием
              $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
              
              // проверяем если существует файл
                if (file_exists($controllerFile))
                {
                    // подгружаем файл с контроллером
                    require_once($controllerFile);
                }
              
              // проверяем если не существует класса скидываем вызов к начальным параметрам
              $classCheck = class_exists($controllerName);
              if($classCheck == false){$controllerName = new MainController; $actionName = 'actionIndex';}
                
              // создаем объект класса
              $controllerObject = new $controllerName;      
              
              // проверить существует в объекте класса вызываемый метод,  если нет скидываем всё к начальным параметрам
              $methodCheck = (method_exists($controllerObject, $actionName)); // false
              if($methodCheck == false){$controllerObject = new MainController; $actionName = 'actionIndex';}
              
              // вызываем в объекте класса метод и передаем ему параметры
              $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
 
              // вызваный метод контроллера переключает $result в true и цикл останавливается
              if($result != null)
                {
                   break;
                }
              
          }
       } 
    }
}

