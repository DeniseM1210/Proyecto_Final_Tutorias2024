<?php
    include('controller_alumno.php');

    $alumnoDAO = new AlumnoDAO();

    var_dump($_GET['nc']);

    if($alumnoDAO->eliminarAlumno($_GET['nc'])){
        header('location: ../pages/consultas_alumnos.php');
    }else{
        echo "No funciono";
    }
?>