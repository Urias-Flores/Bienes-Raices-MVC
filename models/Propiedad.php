<?php

namespace Model;

use Model\ActiveRecord;

class Propiedad extends ActiveRecord{

    protected static $Colums = 
    ['Titulo', 'Precio', 'Descripcion', 'Habitaciones', 'banos', 'Estacionamiento', 'VendedorID', 'Fecha', 'Imagen'];
    protected static $tabla = 'Propiedad';

    public $ID;
    public $Titulo;
    public $Precio;
    public $Imagen;
    public $Descripcion;
    public $Habitaciones;
    public $banos;
    public $Estacionamiento;
    public $Fecha;
    public $VendedorID;

    public function __construct($args = [])
    {
        $this->ID = $args['PropiedadID'] ?? null;
        $this->Titulo = $args['Titulo'] ?? '';
        $this->Precio = $args['Precio'] ?? '';
        $this->Imagen = $args['Imagen'] ?? '';
        $this->Descripcion = $args['Descripcion'] ?? '';
        $this->Habitaciones = $args['Habitaciones'] ?? '';
        $this->banos = $args['banos'] ?? '';
        $this->Estacionamiento = $args['Estacionamiento'] ?? '';
        $this->Fecha = date('Y-m-d') ?? '';
        $this->VendedorID = $args['VendedorID'] ?? '';
    }

    public function validate() : array {
        if(!$this->Titulo){
            self::$Errores[] = 'Debes agregar un titulo';
        }
        if(!$this->Precio){
            self::$Errores[] = 'Debes agregar el precio';
        }
        if(!$this->Descripcion){
            self::$Errores[] = 'Debes agregar la descripcion o ser mayor de 50 caracteres';
        }
        if(!$this->Habitaciones){
            self::$Errores[] = 'Debes agregar un numero de habitaciones';
        }
        if(!$this->banos){
            self::$Errores[] = 'Debes agregar un numero de baños';
        }
        if(!$this->Estacionamiento){
            self::$Errores[] = 'Debes agregar un numero de estacionamientos';
        }
        if($this->VendedorID === ""){
            self::$Errores[] = 'Debes agregar un vendedor';
        }
        if(!$this->Imagen){
            self::$Errores[] = 'Debes agregar una imagen';
        }
        return self::$Errores;
    }
}

?>