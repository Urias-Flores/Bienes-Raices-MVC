<?php

namespace Model;

use Model\ActiveRecord;

class Login extends ActiveRecord {
    protected static $tabla = 'usuario';
    protected static $columns = ['ID', 'Correo', 'Contrasena'];

    public $ID;
    public $Correo;
    public $Contrasena;

    public function __construct($arg = [])
    {
        $this->ID = $arg['ID'] ?? null;
        $this->Correo = $arg['Usuario'] ?? '';
        $this->Contrasena = $arg['Contrasena'] ?? '';
    }

    public function usuarioExist()
    {
        $Query = 'SELECT * FROM ' . self::$tabla . ' WHERE Correo="' . $this->Correo . '"';
        $Result = self::$Conection->query($Query);

        if($Result->num_rows > 0){
            return $Result;
        }else{
            self::$Errores[] = 'El usuario no existe';
            return;
        }
    }

    public function verifyUser($User){
        $InfoUser = $User->fetch_object();
        $Result = password_verify($this->Contrasena, $InfoUser->Contrasena);
        if(!$Result){
            self::$Errores[] = 'La contrasena es incorrecta';
        }
        return $Result;
    }

    public function auth(){
        session_start();
        $_SESSION['Usuario'] = $this->Correo;
        $_SESSION['login'] = true;

        header('location: /admin');
    }

    public function validate() : array{
        if(!$this->Correo){
            self::$Errores[] = 'El usuario es obligatorio';
        }
        if(!$this->Contrasena){
            self::$Errores[] = 'La contrasena es obligatorio';
        }
        return self::$Errores;
    }
}