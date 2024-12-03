<?php

include_once('../database/conexion_bd.php');
$con = new ConexionBD();
$conexion = $con->getConexion();

//recibir la peticion con JSON a traves de HTTP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cadenaJSON = file_get_contents('php://input');

    if ($cadenaJSON == false) {
        echo "No hay cadena JSON";
    } else {
        //recibir la peticion con JSON a traves de HTTP
        $consulta_con_filtros = json_decode($cadenaJSON, true);
        $fnc = $consulta_con_filtros['fnc'];
        $fn = $consulta_con_filtros['fn'];
        $fpAp = $consulta_con_filtros['fpAp'];
        $fsAp = $consulta_con_filtros['fsAp'];
        $fs = $consulta_con_filtros['fs'];
        $fc = $consulta_con_filtros['fc'];
        $ff = $consulta_con_filtros['ff'];
        $ft = $consulta_con_filtros['ft'];

        $sql = "SELECT * FROM Alumnos;";
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
            $respuesta['consulta'] = 'exito';
        } else {
            $respuesta['consulta'] = 'no hay registros';
        }
        $respuestaJSON = json_encode($respuesta);
        echo $respuestaJSON;
    }
}
