<?php
    include('controller_usuario.php');

    $tipo = $_POST['tipo'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];
    $correo = $_POST['correo'];

    //validacion
    $datos_correctos = false;
    $dccorreo = false;
    session_start();

    if(isset($tipo) && !empty($tipo) && isset($usuario) && !empty($usuario) && isset($pass) && !empty($pass)){
        $datos_correctos = true;
    }

    if(!isset($correo) || empty($correo) || !preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $correo)){
        $dccorreo = false;
        $_SESSION['err_correo'] = true;
    }else{
        $dccorreo = true;
    }

    if($dccorreo == false){
        $datos_correctos = false;
    }else{
        $datos_correctos = true;
    }

    if($datos_correctos == true){
        $usuarioDAO = new UsuarioDAO();
        $res = $usuarioDAO->agregarUsuario($tipo, $usuario, $pass,$correo);
        if($res == 1){
            header('location: ../pages/login.php');
        }
    }else{
        $_SESSION['error_validacion'] = true;
        $_SESSION['correo'] = $_POST['correo'];
        header('Location: ../pages/formulario_registro.php');
    }

?>