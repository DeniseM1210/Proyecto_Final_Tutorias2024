<?php

    include('controller_alumno.php');
    $alumnoDAO = new AlumnoDAO();

    if($alumnoDAO->editarAlumno($_POST['caja_nc'],$_POST['caja_nombre'],$_POST['caja_primerAp'],$_POST['caja_segundoAp'],$_POST['caja_semestre'],$_POST['caja_carrera'],$_POST['caja_fecha'],$_POST['caja_tel'])){
        header('location: ../pages/gestion_alumnos.php');
    }else{
        echo ":C";
    }
    

?>