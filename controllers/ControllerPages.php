<?php

namespace Controller;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class ControllerPages{

    public static function index(Router $router){
        $Instance = new Propiedad();
        $Propiedades = $Instance->Get(3);

        $router->render('/paginas/index', [
            'Propiedades' => $Propiedades,
            'inicio' => true
        ]);
    }

    public static function nosotros(Router $router){
        $router->render('/paginas/nosotros');
    }

    public static function propiedades(Router $router){
        $Propiedad = new Propiedad();
        $Propiedades = $Propiedad->All();

        unset($Propiedad);
        $router->render('/paginas/propiedades', [
            'Propiedades' => $Propiedades
        ]);
    }

    public static function propiedad(Router $router){
        $id = redirect('/propiedades');

        $Instance = new Propiedad();
        $Propiedad = $Instance->Find($id);
        $router->render('/paginas/propiedad', [
            'Propiedad' => $Propiedad
        ]);
    }

    public static function blog(Router $router){
        $router->render('/paginas/blog');
    }

    public static function entrada(Router $router){
        $router->render('/paginas/entrada');
    }

    public static function contacto(Router $router){
        $mensaje = 0;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST['data'];
            $phpmailer = new PHPMailer();

            $phpmailer->isSMTP();
            $phpmailer->Host = 'smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '80b83a71742a04';
            $phpmailer->Password = 'cf044861cb36b7';

            $phpmailer->setFrom('osoriourias@gmail.com');
            $phpmailer->addAddress('osoriourias@gmail.com');
            $phpmailer->Subject = 'Bienvenido a bienece raices S.A de C.V';

            $phpmailer->isHTML(true);
            $phpmailer->CharSet = 'UTF-8';

            $contenido = '<html>';
            $contenido .= '<p>Nombre: '. $data['Nombre'] .'</p>';
            $contenido .= '<p>Mensaje: '. $data['Mensaje'] .'</p>';
            $contenido .= '<p>Desea: '. $data['Tipo'] .'</p>';
            $contenido .= '<p>Precio: $'. $data['Precio'] .'</p>';
            if($data['tipoContacto'] === 'telefono'){
                $contenido .= '<p>Telefono: '. $data['Telefono'] .'</p>';
                $contenido .= '<p>Deseo ser contactado:</p>';
                $contenido .= '<p>Fecha: '. $data['Fecha'] .'</p>';
                $contenido .= '<p>Hora: '. $data['Hora'] .'</p>';
            }else{
                $contenido .= '<p>Correo electronico: '. $data['Email'] .'</p>';
            }
            $contenido .= '</html>';

            $phpmailer->Body = $contenido;
            $phpmailer->AltBody = 'Este es el contenido';

            if($phpmailer->send()){
                $mensaje = 1;
            }
            else{
                $mensaje = -1;
            }
            unset($phpmailer);
        }

        $router->render('/paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}