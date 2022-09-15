<?php

require_once  __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controller\ControllerPropiedad;
use Controller\ControllerVendedor;
use Controller\ControllerPages;
use Controller\ControllerLogin;

$route = new Router();
#Private zone
$route->GET('/admin', [ControllerPropiedad::class, 'index']);
$route->POST('/admin', [ControllerPropiedad::class, 'index']);
//creacion de propiedades
$route->GET('/propiedad/crear', [ControllerPropiedad::class, 'create']);
$route->POST('/propiedad/crear', [ControllerPropiedad::class, 'create']);
//Actualizacion ****
$route->GET('/propiedad/actualizar', [ControllerPropiedad::class, 'update']);
$route->POST('/propiedad/actualizar', [ControllerPropiedad::class, 'update']);
//Eliminacion ****
$route->POST('/propiedad/eliminar', [ControllerPropiedad::class, 'delete']);

//creacion de vendedores
$route->GET('/vendedor/crear', [ControllerVendedor::class, 'create']);
$route->POST('/vendedor/crear', [ControllerVendedor::class, 'create']);
//Actualizacion ****
$route->GET('/vendedor/actualizar', [ControllerVendedor::class, 'update']);
$route->POST('/vendedor/actualizar', [ControllerVendedor::class, 'update']);
//Eliminacion ****
$route->POST('/vendedor/eliminar', [ControllerVendedor::class, 'delete']);

#Public Zone
$route->GET('/', [ControllerPages::class, 'index']);
$route->GET('/nosotros', [ControllerPages::class, 'nosotros']);
$route->GET('/propiedades', [ControllerPages::class, 'propiedades']);
$route->GET('/propiedad', [ControllerPages::class, 'propiedad']);
$route->GET('/blog', [ControllerPages::class, 'blog']);
$route->GET('/entrada', [ControllerPages::class, 'entrada']);
$route->GET('/contacto', [ControllerPages::class, 'contacto']);
$route->POST('/contacto', [ControllerPages::class, 'contacto']);

#Login
$route->GET('/login', [ControllerLogin::class, 'login']);
$route->POST('/login', [ControllerLogin::class, 'login']);
$route->GET('/logout', [ControllerLogin::class, 'logout']);


$route->validateURL();


