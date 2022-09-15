<?php

namespace Model;
use mysqli;

class ActiveRecord{
    protected static $Conection;

    protected static $Colums = [];
    protected static $tabla = '';
    protected static $Errores = [];

    public function setImage($Imagen) : void{
        $this->Imagen = $Imagen;
    }

    public function setID($ID) : void{
        $this->ID = $ID;
    }

    public static function setConection(mysqli $Conection)
    {
        self::$Conection = $Conection;
    }

    public function Save() : bool {
        $sanitizedProperties = $this->sanitizeData();
        $InsertedColumns = join(', ', array_keys($sanitizedProperties));
        $InsertedValues = join("', '", array_values($sanitizedProperties));

        $Query = "INSERT INTO ".static::$tabla." (".$InsertedColumns.") VALUES ( '".$InsertedValues."' ) ";
        $Result = self::$Conection->query($Query);
        if($Result){
            return true;
        }
        return false;
    }

    public function Update() : bool {
        $sanitizedProperties = $this->sanitizeData();

        $values = [];
        foreach($sanitizedProperties as $key => $value){
            $values[] = "${key} = '${value}'";
        }

        $templateUpdate = join(', ', $values);

        $Query = "UPDATE ".static::$tabla." SET ".$templateUpdate." WHERE ID = ".$this->ID."";
        $Result = self::$Conection->query($Query);
        return $Result;
    }

    public function Delete() : bool {
        $Query = "DELETE FROM ".static::$tabla." WHERE ID = ". $this->ID;
        $Result = self::$Conection->query($Query);
        return $Result;
    }

    public function Find($ID) {
        $Query = "SELECT * FROM ".static::$tabla." WHERE ID = " . $ID;
        $Result =  $this->consultSQL($Query);
        return array_shift( $Result );
    }

    public function All() : array {
        $Query = "SELECT * FROM ".static::$tabla.";";
        return $this->consultSQL($Query);
    }

    public function Get($amount) : array {
        $Query = "SELECT * FROM ".static::$tabla." LIMIT " . $amount ;
        return $this->consultSQL($Query);
    }

    private function generateArrayOfProperties() : array {
        $Properties = [];
        foreach(static::$Colums as $Colum){
            $Properties[$Colum] = $this->$Colum;
        }
        return $Properties;
    }

    private function sanitizeData() : array {
        $Properties = $this->generateArrayOfProperties();
        foreach($Properties as $key => $Value){
            $Properties[$key] = self::$Conection->real_escape_string($Value);
        }
        return $Properties;
    }

    private function consultSQL($Query) : array{
        $Result = self::$Conection->query($Query);
        $arrayObject = [];
        while($row = $Result->fetch_assoc()){
            $arrayObject[] = $this->createObject($row);
        }
        return $arrayObject;
    }

    private function createObject($arrayObject) : self{
        $Object = new static;
        foreach($arrayObject as $Key => $Value){
            if(property_exists($Object, $Key)){
                $Object->$Key = $Value;
            }
        }
        return $Object;
    }

    public static function getErrores() : array {
        return self::$Errores;
    }

    public function validate() : array {
        return self::$Errores;
    }
}

?>