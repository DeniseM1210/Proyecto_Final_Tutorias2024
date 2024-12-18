<?php

include_once('../database/conexion_bd.php');
$conexion = ConexionBD::getInstance()->getConexion();

//recibir la peticion con JSON a traves de HTTP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cadenaJSON = file_get_contents('php://input');

    if ($cadenaJSON == false) {
        echo "No hay cadena JSON";
    } else {
        //recibir la peticion con JSON a traves de HTTP
        $consulta_con_filtros = json_decode($cadenaJSON, true);
        $fnc = $consulta_con_filtros['nc'];
        
        if($fnc == ""){
            $sql = "SELECT * FROM Alumnos;";
        }else{
            $sql = "SELECT * FROM Alumnos WHERE Num_Control LIKE '$fnc%';";
        }
        
        $res = mysqli_query($conexion, $sql);
        //configurar RESPUESTA JSON (RESPONSE)
        $respuesta['alumnos'] = array();
        if ($res) {
            while ($fila = mysqli_fetch_assoc($res)) {
                $alumno = array();
                $alumno['nc'] = $fila['Num_Control'];
                $alumno['n'] = $fila['Nombre'];
                $alumno['pAp'] = $fila['Primer_Ap'];
                $alumno['sAp'] = $fila['Segundo_Ap'];
                $alumno['s'] = $fila['Semestre'];
                $alumno['c'] = $fila['Carrera'];
                $alumno['f'] = $fila['Fecha_Nacimiento'];
                $alumno['t'] = $fila['Num_Telefono'];
                array_push($respuesta['alumnos'], $alumno);
            }
            $respuesta['res'] = 'exito';
        } else {
            $respuesta['res'] = 'no hay registros';
        }
        $respuestaJSON = json_encode($respuesta);
        echo $respuestaJSON;
    }
}
