<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
        require_once('menu_principal.php')
    ?>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h5 class="card-title text-center">Bienvenido</h5>
                <form>
                    <!-- Campo de Nombre de Usuario -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="username" placeholder="Usuario" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">No. Control</label>
                        <input type="text" class="form-control" id="num_control" placeholder="No. Control" required>
                    </div>

                    <!-- Campo de Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Contraseña" required>
                    </div>

                    <!-- Botón de Iniciar Sesión -->
                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>

                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                        <a href="">Registrarse</a>
                        <a href="">Olvidé mi contraseña</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>