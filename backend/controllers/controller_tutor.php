<?php
include_once('../../database/conexion_bd.php');
    class AlumnoDAO{
        private $conexion;

        public function __CONSTRUCT(){
            $this->conexion = new ConexionBD(); 
        }

        // ---- metodos abcc ----

        //Altas
        public function agregarTutor($nc,$nombre,$primerAp,$segundoAp,$semestre,$carrera,$fecha,$numTel){
            $sql = "INSERT INTO tutores VALUES('$nc', '$nombre', '$primerAp', '$segundoAp', $semestre, '$carrera','$fecha','$numTel')";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        //Bajas
        public function eliminarTutor($nc){
            $sql = "DELETE FROM tutores WHERE Num_Control = '$nc'";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        //Cambios
        public function editarTutor($nc,$nombre,$pA,$sA,$semestre,$carrera,$fecha,$numTel){
            $sql = "UPDATE tutores SET Nombre = '$nombre', Primer_Ap = '$pA', Segundo_Ap = '$sA', Semestre = $semestre, Carrera = '$carrera', Fecha_Nacimiento = '$fecha', Num_Telefono = '$numTel' WHERE Num_Control = '$nc';";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        //Consultas
        public function mostrarTutores($filtro){
            $sql = "SELECT * FROM tutores;";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        public function mostrarTutoresFiltro($filtro){
            $res = mysqli_query($this->conexion->getConexion(), $filtro);
            return $res;
        }

        //Funcion para la edad

    }
?>