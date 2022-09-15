<?php

namespace Model;

use Model\ActiveRecord;

class Vendedor extends ActiveRecord{

    protected static $Colums = 
    ['Nombre', 'Apellido', 'Telefono'];
    protected static $tabla = 'Vendedor';

    public $ID;
    public $Nombre;
    public $Apellido;
    public $Telefono;

    public function __construct($args = [])
    {
        $this->VendedorID = $args['ID'] ?? null;
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Apellido = $args['Apellido'] ?? '';
        $this->Telefono = $args['Telefono'] ?? '';
    }

    public function validate(): array
    {
        if(!$this->Nombre){
            self::$Errores[] = 'El nombre es obligatorio';
        }
        if(!$this->Apellido){
            self::$Errores[] = 'El apellido es obligatorio';
        }
        if(!$this->Telefono){
            self::$Errores[] = 'El numero telefonico es obligatorio';
        }
        if(!preg_match("/[0-9]{8}/", $this->Telefono)){
            self::$Errores[] = 'Formato de numero telefonico no es valido';
        }
        return self::$Errores;
    }

}

?>