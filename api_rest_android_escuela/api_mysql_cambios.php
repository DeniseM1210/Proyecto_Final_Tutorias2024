<?php

    include_once('../database/conexion_bd.php');

    $conexion = ConexionBD::getInstance()->getConexion();
    //reci la peticion con JSON a traves de HTTP
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cadenaJSON = file_get_contents('php://input');
        if($cadenaJSON == false){
            echo "No hay cadena JSON";
        }else{
            //recibir la peticion con JSON a traves de HTTP
            $datos_alumno = json_decode($cadenaJSON,true);
            $nc = $datos_alumno['nc'];
            $n = $datos_alumno['n'];
            $pAp = $datos_alumno['pAp'];
            $sAp = $datos_alumno['sAp'];
            $s = $datos_alumno['s'];
            $c = $datos_alumno['c'];
            $f = $datos_alumno['f'];
            $t = $datos_alumno['t'];

            $sql = "UPDATE Alumnos SET Nombre = '$n', Primer_Ap = '$pAp', Segundo_Ap = '$sAp',
            Semestre = '$s', Carrera = '$c', Fecha_Nacimiento = '$f', Num_Telefono = '$t' WHERE Num_Control = '$nc';";
            $res = mysqli_query($conexion,$sql);
            
            //configurar RESPUESTA JSON (RESPONSE)
            $respuesta = array();
            if($res){
                $respuesta['cambio'] = 'exito';
            }else{
                $respuesta['cambio'] = 'fracaso';
            }
            $respuestaJSON = json_encode($respuesta);
            echo $respuestaJSON;

        }

    }

    

?>