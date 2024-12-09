
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once('menu_principal_T.php');
        require_once('consultas_alumnos.php');
    ?>
</body>
</html>

<?php
    include_once('../controllers/controller_alumno.php');
        
        if(isset($_POST['select']) || isset($_POST['select'])){
            $filtro = $_POST['select'];
            $busqueda = $_POST['caja_filtro'];
        }else{
            $filtro = 0;
        }

        
    

    $alumnoDAO = new AlumnoDAO();
    if($filtro == 1){
        $datos = $alumnoDAO->mostrarAlumnosFiltro("SELECT * FROM Alumnos WHERE Num_Control LIKE '$busqueda%'");
    }else if($filtro == 2){
        $datos = $alumnoDAO->mostrarAlumnosFiltro("SELECT * FROM Alumnos WHERE Nombre LIKE '$busqueda%'");
    }else if($filtro ==3){
        $datos = $alumnoDAO->mostrarAlumnosFiltro("SELECT * FROM Alumnos WHERE Primer_Ap LIKE '$busqueda%'");
    }else if($filtro == 4){
        $datos = $alumnoDAO->mostrarAlumnosFiltro("SELECT * FROM Alumnos WHERE Segundo_Ap LIKE '$busqueda%'");
    }else if($filtro == 5){
        $datos = $alumnoDAO->mostrarAlumnosFiltro("SELECT * FROM Alumnos WHERE Semestre LIKE '$busqueda%'");
    }else if($filtro == 6){
        $datos = $alumnoDAO->mostrarAlumnosFiltro("SELECT * FROM Alumnos WHERE Carrera LIKE '$busqueda%'");
    }else if($filtro == 7){
        $datos = $alumnoDAO->mostrarAlumnosFiltro("SELECT * FROM Alumnos WHERE Num_Telefono LIKE '$busqueda%'");
    }else{
        $datos = $alumnoDAO->mostrarAlumnos("x");
    }
    echo '<div class="container">';
    //var_dump($datos);
    if(mysqli_num_rows($datos)>0){
        
        echo'<div class="table-responsive" style="overflow-y: scroll; height: 425px;"><table class="table table-success table-striped" style="overflow-y: scroll;">';
        echo'<thead>
            <tr>
                <th> Num. Control </th>
                <th> Nombre </th>
                <th> Primer Ap </th>
                <th> Segundo Ap </th>
                <th> Semestre </th>
                <th> Carrera </th>
                <th > Acciones </th>
            </tr>
            </thead> <tbody>';
        

    


        while($fila = mysqli_fetch_assoc($datos)){
            printf("<tr> <td>".$fila['Num_Control']."</td>
            <td>".$fila['Nombre']."</td>
            <td>".$fila['Primer_Ap']."</td>
            <td>".$fila['Segundo_Ap']."</td>
            <td>".$fila['Semestre']."</td>
            <td>".$fila['Carrera']."</td>
            <td> 
            <a class='btn btn-primary' href='detallesA?nc=%s&nombre=%s&primerAp=%s&segundoAp=%s&semestre=%d&carrera=%s&fecha=%s&tel=%s'> 
                <i class='bi bi-eye'></i>
            </a>",$fila['Num_Control'],$fila['Nombre'],$fila['Primer_Ap'],$fila['Segundo_Ap'],$fila['Semestre'],$fila['Carrera'],$fila['Fecha_Nacimiento'],$fila['Num_Telefono']);

            printf("
            <a  class='btn btn-info' href='formulario_editar_alumnos?nc=%s&nombre=%s&primerAp=%s&segundoAp=%s&semestre=%d&carrera=%s&fecha=%s&tel=%s'>
                <i class='bi bi-pencil-square'></i>
            </a>",$fila['Num_Control'],$fila['Nombre'],$fila['Primer_Ap'],$fila['Segundo_Ap'],$fila['Semestre'],$fila['Carrera'],$fila['Fecha_Nacimiento'],$fila['Num_Telefono']);

            printf("
            <a class= 'btn btn-danger' href='../../backend/controllers/procesar_bajas.php?nc=%s'> 
                <i class='bi bi-trash-fill'></i>
            </a>

            </td>"
            ,$fila['Num_Control']);
        }
        echo '</tbody></table></div>';
    }else{
        echo"<h1>Tabla Vacia </h1>";
    }
    echo "</div>";

?>