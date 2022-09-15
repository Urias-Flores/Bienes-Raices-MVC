<?php

use App\Propiedad;

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPERA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function loadTemplate( string $template, bool $inicio = false){
    include TEMPLATES_URL . "/${template}.php";
}

function isAuthenticated() : bool{
    if(!isset($_SESSION['login'])){
        session_start();
    }
    if(empty($_SESSION['login'])){
        return false;
    }
    $auth = $_SESSION['login'];
    if($auth){
        return true;
    }
    return false;
}

function debug($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    exit;
}

function scapeHTML($HTML) : string{
    return htmlspecialchars($HTML);
}

function validateTypeConten($type){
    $validValues = ['Vendedor', 'Propiedad'];
    return in_array($type, $validValues);
}

function getMessage($value){
    $message = '';
    switch($value){
        case 1:
            $message = 'Actualizado con exito';
            break;
        case -1:
            $message = 'Eliminado con exito';
            break;
        case 2:
            $message = 'Creado con exito';
            break;
        default:
            $message = '';
            break;
    }
    return $message;
}

function redirect(string $url){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("location: ${url}");
    }

    return $id;
}