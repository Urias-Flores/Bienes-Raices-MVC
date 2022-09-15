<?php

function createConnection() {
    $ObjectConection = new mysqli("localhost", "root", "alone2020", "bienesraices", 3306);
    if(!$ObjectConection){
        echo 'Error al conectar con la base de datos';
        return null;
    }
    return $ObjectConection;
}

?>
