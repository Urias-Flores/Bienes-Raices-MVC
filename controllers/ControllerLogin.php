<?php

namespace Controller;

use MVC\Router;
use Model\Login;

class ControllerLogin{

    public static function login(Router $router){
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Instance = new Login($_POST);

            $errores = $Instance->validate();

            if(empty($errores)){
                $Result = $Instance->usuarioExist();

                if(!$Result) {
                    $errores = $Instance::getErrores();
                }else{
                    $Final = $Instance->verifyUser($Result);

                    if($Final){
                        $Instance->auth();
                    }else{
                        $errores = $Instance::getErrores();
                    }
                }
            }
        }

        $router->render('/auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout(){
        session_start();

        $_SESSION = [];

        header('location: /');
    }
}