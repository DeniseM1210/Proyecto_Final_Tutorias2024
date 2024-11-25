<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    require_once('menu_principal_T.php');
    ?>
    <div class="container">
        <h2>Agregar Alumno</h1>
            <div style="display:<?php echo isset($_SESSION['insercion_correcta']) ?'content':'none' ;?>;" class="alert alert-success alert-dismissible fade show" role="alert">
                Registro agregado correctamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../controllers/procesar_altas.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Numero de Control</label>
                        <input type="text" class="form-control" id="caja_nc" name="caja_nc" placeholder="Numero de Control"
                        value="<?php 
                            if(isset($_SESSION['nc'])){
                                echo $_SESSION['nc'];
                            }?>" >
                        <div style="color:red;"> 
                            <?php  if(isset($_SESSION['err_nc'])){
                                        echo "Solo numeros enteros";
                                    } ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Nombre</label>
                        <input type="text" class="form-control" id="caja_nombre" name="caja_nombre" placeholder="Nombre"
                        value="<?php 
                            if(isset($_SESSION['nombre'])){
                                echo $_SESSION['nombre'];
                            }?>">
                            <div style="color:red;"> 
                            <?php  if(isset($_SESSION['err_nombre'])){
                                        echo "Solo letras";
                                    } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Primer Apellido</label>
                    <input type="text" class="form-control" id="caja_primerAp" name="caja_primerAp" placeholder="Apellido Paterno" value="<?php 
                            if(isset($_SESSION['pAp'])){
                                echo $_SESSION['pAp'];
                            }?>">
                            <div style="color:red;"> 
                            <?php  if(isset($_SESSION['err_pAp'])){
                                        echo "Solo letras";
                                    } ?>
                        </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Segundo Apellido</label>
                    <input type="text" class="form-control" id="caja_segundoAp" name="caja_segundoAp" placeholder="Apellido Materno" value="<?php 
                            if(isset($_SESSION['sAp'])){
                                echo $_SESSION['sAp'];
                            }?>">
                            <div style="color:red;"> 
                            <?php  if(isset($_SESSION['err_sAp'])){
                                        echo "Solo letras";
                                    } ?>
                        </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Edad</label>
                        <input type="number" class="form-control" id="caja_edad" name="caja_edad" placeholder="Edad" value="<?php 
                            if(isset($_SESSION['edad'])){
                                echo $_SESSION['edad'];
                            }?>">
                            <div style="color:red;"> 
                            <?php  if(isset($_SESSION['err_edad'])){
                                        echo "Solo numeros enteros";
                                    } ?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Semestre</label>
                        <input type="number" class="form-control" id="caja_semestre" name="caja_semestre" placeholder="Semestre" value="<?php 
                            if(isset($_SESSION['semestre'])){
                                echo $_SESSION['semestre'];
                            }?>">
                            <div style="color:red;"> 
                            <?php  if(isset($_SESSION['err_semestre'])){
                                        echo "Solo numeros enteros";
                                    } ?>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputZip">Carrera</label>
                        <input type="text" class="form-control" id="caja_carrera" name="caja_carrera" placeholder="Carrera" value="<?php 
                            if(isset($_SESSION['carrera'])){
                                echo $_SESSION['carrera'];
                            }?>">
                            <div style="color:red;"> 
                            <?php  if(isset($_SESSION['err_carrera'])){
                                        echo "Solo letras";
                                    } ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Dar de Alta</button>
    </div>


    </form>
    </div>

</body>

</html>

<?php
    unset($_SESSION['insercion_correcta']);
    unset($_SESSION['error_validacion']);

    unset($_SESSION['nc']);
    unset($_SESSION['nombre']);
    unset($_SESSION['pAp']);
    unset($_SESSION['sAp']);
    unset($_SESSION['edad']);
    unset($_SESSION['semestre']);
    unset($_SESSION['carrera']);

    unset($_SESSION['err_nc']);
    unset($_SESSION['err_nombre']);
    unset($_SESSION['err_pAp']);
    unset($_SESSION['err_sAp']);
    unset($_SESSION['err_edad']);
    unset($_SESSION['err_semestre']);
    unset($_SESSION['err_carrera']);
?>