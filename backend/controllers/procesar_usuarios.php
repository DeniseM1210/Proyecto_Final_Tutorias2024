<?php
    include('controller_usuario.php');

    $tipo = $_POST['tipo'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];

    $datos_correctos = false;
    if(isset($tipo) && !empty($tipo) && isset($usuario) && !empty($usuario) && isset($pass) && !empty($pass)){
        $datos_correctos = true;
    }

    if($datos_correctos){
        $usuarioDAO = new UsuarioDAO();
        $res = $usuarioDAO->agregarUsuario($tipo, $usuario, $pass);
        if($res){
            header('Location: ../pages/login.php');
        }
    }

?>