<?php
    include('../../database/conexion_bd.php');

    class UsuarioDAO{
        private $conexion;

        public function __CONSTRUCT(){
            $this->conexion = new ConexionBD();
        }

        public function agregarUsuario($tipo, $usu, $pass,$correo){
            $sql = "INSERT INTO usuarios VALUES('$tipo', sha1('$usu'), sha1('$pass'), '$correo');";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        public function buscarUsuarioCorreo($correo){
            $sql = "SELECT * FROM usuarios WHERE correo = '$correo';";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        public function cambiarContraseña($user,$pass){
            $sql = "UPDATE usuarios SET password = sha1('$pass') WHERE usuario = '$user';";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        
    }

?>