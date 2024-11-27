<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>
    <?php
    require_once('menu_principal.php')
    ?>
    <form action="../controllers/validar_usuario.php" method="POST">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h5 class="card-title text-center">Bienvenido</h5>
                <form>
                    <!-- Campo de Nombre de Usuario -->
                    <div class="mb-3">
                    <label  class="form-label">Tipo</label>
                        <select  name="tipo" class="form-select" aria-label="Default select example">
                            <option value="alumno">Alumno</option>
                            <option value="tutor">Tutor</option>
                            <option value="jefe">Jefe de Division</option>
                            <option value="psicologo">Prsicologo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuario" required>
                    </div>

                    <!-- Campo de Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Contraseña" required>
                    </div>

                    <!-- Botón de Iniciar Sesión -->
                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>

                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                        <a href="./formulario_registro.php">Registrarse</a>
                        <a href="./correo_verificacion.php">Olvidé mi contraseña</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </form>
</body>

</html>