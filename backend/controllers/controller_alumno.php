<?php
include_once('../../database/conexion_bd.php');
    class AlumnoDAO{
        private $conexion;

        public function __CONSTRUCT(){
            $this->conexion = ConexionBD::getInstance()->getConexion();
        }

        // ---- metodos abcc ----

        //Altas
        public function agregarAlumno($nc,$nombre,$primerAp,$segundoAp,$semestre,$carrera,$fecha,$numTel){
            try {
                $this->conexion->begin_transaction();
                $sql = "INSERT INTO alumnos VALUES('$nc', '$nombre', '$primerAp', '$segundoAp', $semestre, '$carrera','$fecha','$numTel')";
                $res = mysqli_query($this->conexion, $sql);
                return $res;
                
                $this->conexion->commit();
            } catch (Exception $e) {
                $this->conexion->rollBack();
                echo "Error en la transacción: " . $e->getMessage();
            }
           
        }

        //Bajas
        public function eliminarAlumno($nc){
            $sql = "DELETE FROM alumnos WHERE Num_Control = '$nc'";
            $res = mysqli_query($this->conexion, $sql);
            return $res;
        }

        //Cambios
        public function editarAlumno($nc,$nombre,$pA,$sA,$semestre,$carrera,$fecha,$numTel){
            $sql = "UPDATE alumnos SET Nombre = '$nombre', Primer_Ap = '$pA', Segundo_Ap = '$sA', Semestre = $semestre, Carrera = '$carrera', Fecha_Nacimiento = '$fecha', Num_Telefono = '$numTel' WHERE Num_Control = '$nc';";
            $res = mysqli_query($this->conexion, $sql);
            return $res;
        }

        //Consultas
        public function mostrarAlumnos($filtro){
            $sql = "CALL obtenerAlumnos()";
            $res = mysqli_query($this->conexion, $sql);
            return $res;
        }

        public function mostrarAlumnosFiltro($filtro){
            $res = mysqli_query($this->conexion, $filtro);
            return $res;
        }

        //Funcion para la edad
        public function funcionEdad($nc){
            $sql = "SELECT CalcularEdad(fecha_nacimiento) AS edad FROM alumnos WHERE Num_Control = '$nc'";
            $res = mysqli_query($this->conexion, $sql);
            return $res;
        }


    }
?>