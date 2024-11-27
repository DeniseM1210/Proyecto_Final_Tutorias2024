<?php

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];

//Verificacion de User and Password en BD

include_once('../../database/conexion_bd.php');

$con = new ConexionBD();
$conexion = $con->getConexion();
session_start();
if($conexion){
    //$sql = "SELECT * FROM usuarios WHERE Nombre_Usuario = '$usuario' AND Password = '$password';";
    $u_c = sha1($usuario);
    $p_c = sha1($password);

    $sql = "SELECT * FROM usuarios WHERE usuario = '$u_c' AND password = '$p_c' AND tipo = '$tipo';";
    $res = mysqli_query($conexion,$sql);
    if(mysqli_num_rows($res)==1){
        //echo "usuario encontrado";
        
        $_SESSION['valida']= true;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo_u'] = $tipo;
        if($tipo == "alumno"){
            header('location: ../pages/menu_principal_A.php');
        }else{
            header('location: ../pages/menu_principal_T.php');
        }
        
        
    }else{
        echo "No encontrado";
    }
}else{
    echo "Error en la conexion";
}





?>