<?php
include_once('../../database/conexion_bd_escuela.php');
    class AlumnoDAO{
        private $conexion;

        public function __CONSTRUCT(){
            $this->conexion = new ConexionBDEscuela(); 
        }

        // ---- metodos abcc ----

        //Altas
        public function agregarAlumno($nc,$nombre,$primerAp,$segundoAp,$edad,$semestre,$carrera){
            $sql = "INSERT INTO Alumnos VALUES('$nc', '$nombre', '$primerAp', '$segundoAp', $edad, $semestre, '$carrera')";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        //Bajas
        public function eliminarAlumno($nc){
            $sql = "DELETE FROM Alumnos WHERE Num_Control = '$nc'";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        //Cambios
        public function editarAlumno($nc,$nombre,$pA,$sA,$edad,$semestre,$carrera){
            $sql = "UPDATE Alumnos SET Nombre = '$nombre', Primer_Ap = '$pA', Segundo_Ap = '$sA',
            Edad = $edad, Semestre = $semestre, Carrera = '$carrera' WHERE Num_Control = '$nc';";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        //Consultas
        public function mostrarAlumnos($filtro){
            $sql = "SELECT * FROM Alumnos";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        public function mostrarAlumnosFiltro($filtro){
            $res = mysqli_query($this->conexion->getConexion(), $filtro);
            return $res;
        }


    }
?>