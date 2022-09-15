<?php 

namespace MVC;

class Router {
    private $routesGET = [];
    private $routesPOST = [];

    public function GET($URL, $Function){
        $this->routesGET[$URL] = $Function;
    }

    public function POST($URL, $Function){
        $this->routesPOST[$URL] = $Function;
    }

    public function validateURL(){
        $URL = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        session_start();
        $auth = $_SESSION['login'] ?? null;
        $protectedRoutes = ['/admin', '/propiedad/crear', '/propiedad/actualizar', '/propiedad/eliminar',
            '/vendedor/crear', '/vendedor/actualizar', '/vendedor/eliminar'];

        if(in_array($URL, $protectedRoutes) && !$auth){
            header('location: /');
        }

        if($method === 'GET'){
            $functionName = $this->routesGET[$URL] ?? null;
        }
        if($method === 'POST'){
            $functionName = $this->routesPOST[$URL] ?? null;
        }

        if( $functionName ){
            call_user_func($functionName, $this);
        }else{
            echo 'redireccionando a pagina de error 404';
        }
    }

    public function render($view, $data = []){
        if(!empty($data)){
            foreach($data as $key => $value){
                $$key = $value;
            };
        }

        ob_start();
        include __DIR__ . "/views/${view}.php";

        $contenido = ob_get_clean();
        include __DIR__ . "/views/layout.php";
    }
}

?>