<?php
    include('../../database/conexion_bd.php');

    class UsuarioDAO{
        private $conexion;

        public function __CONSTRUCT(){
            $this->conexion = new ConexionBDEscuela();
        }

        public function agregarUsuario($tipo, $usu, $pass){
            $sql = "INSERT INTO usuarios VALUES('$tipo', sha1('$usu'), sha1('$pass'));";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }
    }

?>