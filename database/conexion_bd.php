<?php
class ConexionBDUsuarios{
    private $conexion;
    //== LOCAL ==
    private $host = "localhost:3306";
    private $usuario = "admin";
    private $password = "admin";
    private $bd = "bd_tutorias";
    

    public function __construct(){
        $this->conexion = mysqli_connect($this->host,$this->usuario,$this->password,$this->bd);
        if(!$this->conexion){
            die("Error en conexion a BD: " . mysqli_connect_error());
        }
    }

    public function getConexion(){
        return $this->conexion;
    }

}
class ConexionBDEscuela{
    private $conexion;
    //== LOCAL ==
    private $host = "localhost:3306";
    private $usuario = "admin";
    private $password = "admin";
    private $bd = "bd_tutorias";
    

    public function __construct(){
        $this->conexion = mysqli_connect($this->host,$this->usuario,$this->password,$this->bd);
        if(!$this->conexion){
            die("Error en conexion a BD: " . mysqli_connect_error());
        }
    }

    public function getConexion(){
        return $this->conexion;
    }

}


?>