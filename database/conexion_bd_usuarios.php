<?php
class ConexionBDUsuarios{
    private $conexion;
    /*
    //== PRODUCCION ==
    private $host = "sql202.infinityfree.com:3306";
    private $usuario = "if0_37251726";
    private $password = "Cesar1xd1";
    private $bd = "if0_37251726_usuarios_bd_escuela";
    */
    
    
    //== LOCAL ==
    private $host = "localhost:3306";
    private $usuario = "Cesar1xd1";
    private $password = "1234";
    private $bd = "usuarios_bd_X";
    

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