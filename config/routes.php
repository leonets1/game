<?php

return array(
        
      // авторизация / регистрация 
        'user/authorisation'    => 'auth/authorisation',
        'user/registration'     => 'auth/registration',
        
        'admin/authorisation'   => 'auth/administration',
        'administration'        => 'main/administration',

        'exit'                  => 'auth/exit',
    
        // кабинет пользователя
        'user'          => 'user/cabinet',
        'start/game'    => 'game/start',
        'start/bonus'   => 'game/bonus',
    
    
        // кабинет администратора
        'admin/([0-9]+)'            => 'admin/cabinet/$1',
    
        // репорт
        'report/([0-9]+)'   => 'main/report/$1',
    
        // начальная страница 
        'main' => 'main/index',
        'index.php' => 'main/index', 
    
        // прямой вход
        '' => 'main/index',
        );
