<?php

namespace Controller;

use Model\Vendedor;
use MVC\Router;

class ControllerVendedor{
    public static function create(Router $router){
        $Vendedor = new Vendedor();
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Vendedor = new Vendedor($_POST);

            $errores = $Vendedor->validate();
            if(empty($errores)){
                $Result = $Vendedor->Save();

                if($Result){
                    header("location: /admin?succes=2");
                }else{
                    $errores[] = 'Ah ocurrido un error al guardar la propiedad';
                }
            }
        }

        $router->render('/vendedor/crear', [
            'Vendedor' => $Vendedor,
            'errores' => $errores
        ]);
    }

    public static function update( Router $router ){
        $id = redirect('/admin');

        $Instance = new Vendedor();
        $Vendedor = $Instance->Find($id);

        $errores = $Instance::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Vendedor = new Vendedor($_POST);
            $Vendedor->setID($id);
            $errores = $Vendedor->validate();
            if(empty( $errores )){
                $resultado = $Vendedor->Update();

                if($resultado){
                    header("location: /admin?succes=1");
                }else{
                    $errores[] = 'Ha ocurrido un erros al actualizar la propiedad';
                }
            }
        }

        $router->render('/vendedor/actualizar', [
            'Vendedor' => $Vendedor,
            'errrores' => $errores
        ]);
    }

    public static function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $ID = $_POST['id'];
            $type = $_POST['type'];

            if(validateTypeConten($type)){
                $Vendedores = new Vendedor();
                $Vendedores->setID($ID);
                $result = $Vendedores->delete();

                if ($result) {
                    header("location: /admin?succes=-1");
                }
            }
        }
    }
}