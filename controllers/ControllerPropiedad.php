<?php

namespace Controller;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class ControllerPropiedad{

    public static function index(Router $route){
        $InstancePropiedad = new Propiedad();
        $Propiedades = $InstancePropiedad->All();

        $InstanceVendedor = new Vendedor();
        $Vendedores = $InstanceVendedor->All();

        $getResult = $_GET['succes'];

        unset($InstancePropiedad); unset($InstanceVendedor);

        $route->render("propiedad/admin", [
            "Propiedades" => $Propiedades,
            "Result" => $getResult,
            "Vendedores" => $Vendedores
        ]);
    }

    public static function create(Router $route){
        $Propiedad = new Propiedad();
        $Vendedor = new Vendedor();

        $Vendedores = $Vendedor->All();
        $errores = $Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $Propiedad = new Propiedad($_POST);

            if(!is_dir(CARPERA_IMAGENES)){
                mkdir(CARPERA_IMAGENES);
            }

            $nombreImagen = md5(uniqid( rand(), true )) . ".jpg";
            if($_FILES['Imagen']['tmp_name']){
                $imagen = Image::make($_FILES["Imagen"]["tmp_name"])->fit(800, 600);
                $Propiedad->setImage($nombreImagen);
            }

            $errores = $Propiedad->validate();
            if(empty( $errores )){
                $Result = $Propiedad->Save();
                if($Result){
                    $imagen->save(CARPERA_IMAGENES . $nombreImagen);
                    unset($Propiedad); unset($Vendedor);
                    header("location: /admin?succes=2");
                }else{
                    $errores[] = 'Ah ocurrido un error al guardar la propiedad';
                }
            }
        }

        $route->render("propiedad/crear", [
            "Propiedad" => $Propiedad,
            "vendedores" => $Vendedores,
            "errores" => $errores
        ]);
    }

    public static function update(Router $route){
        $id = redirect('/admin');
        $Instance = new Propiedad();
        $Vendedor = new Vendedor();
        $Vendedores = $Vendedor->All();
        $Propiedad = $Instance->Find($id);

        $errores = $Instance::getErrores();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Creando la instancia y agregando el ID
            $Instance = new Propiedad($_POST);
            $Instance->setID($id);

            //Agregando el nombre de la imagen
            $nombreImagen = $Propiedad->Imagen;
            $Instance->setImage($nombreImagen);
            $errores = $Instance->validate();
            if (empty($errores)) {
                $nombreImagen = '';
                $modifiedImage = $_FILES['Imagen']['tmp_name'];

                if ($modifiedImage) {
                    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                    $imagen = Image::make($_FILES["Imagen"]["tmp_name"])->fit(800, 600);
                    $Instance->setImage($nombreImagen);
                }

                $resultado = $Instance->Update();
                if ($resultado) {
                    if ($modifiedImage) {
                        unlink(CARPERA_IMAGENES . $Propiedad->Imagen);
                        $imagen->save(CARPERA_IMAGENES . $nombreImagen);
                    }
                    unset($Instance); unset($Vendedor);
                    header("location: /admin?succes=1");
                } else {
                    $errores[] = 'Ha ocurrido un erros al actualizar la propiedad';
                }
            }
        }

        $route->render("propiedad/actualizar", [
            'Propiedad' => $Propiedad,
            'errores' => $errores,
            'vendedores' => $Vendedores
        ]);
    }

    public static function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $ID = $_POST['id'];
            $type = $_POST['type'];

            if(validateTypeConten($type)){
                $Propiedad = new Propiedad();
                $Propiedad->setID($ID);
                $image = $Propiedad->Find($ID)->Imagen;
                $result = $Propiedad->delete();

                if ($result) {
                    if($type === 'Propiedad'){
                        $imageExist = file_exists(CARPERA_IMAGENES . $image);
                        if ($imageExist) {
                            unlink("../imagenes/" . $image);
                        }
                    }
                    header("location: /admin?succes=-1");
                }
            }
        }
    }
}

