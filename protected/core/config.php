<?php

return array(



    /*
    #   меню: название->ссылка
    */
    'menu' => array(
        'главная' => '/',
        'все пользователи' => '/user/users',
        'гость' => array(
            'регистрация' => '/user/registration',
            'войти' => '/user/aut',
            'востановить пароль' => '/user/password',
        ),
        'пользователь' => array(
            'профиль' => '/user/profile',
            'изменить данные' => '/user/edit',
            'выход' => '/user/exit',
        ),
    ),
    
    /*
    #   страници ошибок: название->ссылка
    */
    'error' => array(
        '404' => 'main/error'
    ),    
    
    /*
    #   системный email
    */
    'system' => array(
        'email' => 'admin@gmail.com',
    ), 
    
        
);
