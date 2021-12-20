<?php 
    include("../lib/db.php");
    session_start();
    if(!isset($_SESSION['password'])){
        header("Location: ../index.html");
    }

    if(isset($_POST['buscar'])){
        $boleta = $_POST['boleta'];
        $query = "SELECT * FROM alumnos WHERE boleta = '$boleta'";
        $resultado = mysqli_query($conn,$query);
        $_SESSION['message'] = "";
        $_SESSION['color'] = "";
    }
    else if(isset($_POST['mostrar'])){
        $query = "SELECT * FROM alumnos";
        $resultado = mysqli_query($conn,$query);
        $_SESSION['message'] = "";
        $_SESSION['color'] = "";
    }
    else{
        $query = "SELECT * FROM alumnos";
        $resultado = mysqli_query($conn,$query);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: Administrador :.</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://bootswatch.com/5/zephyr/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">ESCOM | IPN</a>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Cerrar Sesión</a>
                </li>
            </ul>
            <img src="../img/logoESCOMBlanco.png" width="70px" height="60px">
        </div>
    </nav>
    <div class="container">
        <div class="row pt-4">
            <?php
                if (isset($_SESSION['message']) && $_SESSION['message'] != "") {
            ?>
                    <div class="alert alert-<?= $_SESSION['color'] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php
                }
            ?>
        </div>
        <div class="row">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <input type="text" name="boleta" class="form-control" placeholder="Boleta">
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <input type="submit" name="mostrar" value="Mostrar Todo" class="btn btn-primary">
                    </div>
                </div>
            </form>
            <br><br>
            <div class="d-grid">
                <a href="operaciones/insert.php" class="btn btn-primary">Añadir Alumno</a>
            </div>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Boleta</th>
                        <th>Nombre(s)</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Fecha de Nacimiento</th>
                        <th>CURP</th>
                        <th>Sexo</th>
                        <th>Calle</th>
                        <th>No</th>
                        <th>Colonia</th>
                        <th>CP</th>
                        <th>Alcaldia</th>
                        <th>Correo Electrónico</th>
                        <th>Teléfono</th>
                        <th>Escuela</th>
                        <th>Entidad</th>
                        <th>Promedio</th>
                        <th>Opción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($row = mysqli_fetch_array($resultado)){
                ?>
                <tr>
                    <td><?php echo $row['boleta'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['aPaterno'] ?></td>
                    <td><?php echo $row['aMaterno'] ?></td>
                    <td><?php echo $row['nacimiento'] ?></td>
                    <td><?php echo $row['curp'] ?></td>
                    <td><?php echo $row['sexo'] ?></td>
                    <td><?php echo $row['calle'] ?></td>
                    <td><?php echo $row['no'] ?></td>
                    <td><?php echo $row['colonia'] ?></td>
                    <td><?php echo $row['cp'] ?></td>
                    <td><?php echo $row['alcaldia'] ?></td>
                    <td><?php echo $row['correo'] ?></td>
                    <td><?php echo $row['telefono'] ?></td>
                    <td><?php echo $row['escuela'] ?></td>
                    <td><?php echo $row['entidad'] ?></td>
                    <td><?php echo $row['promedio'] ?></td>
                    <td><?php echo $row['opcion'] ?></td>
                    <td>
                        <a href="operaciones/delete.php?id=<?php echo $row['boleta']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                        <a href="operaciones/update.php?id=<?php echo $row['boleta']?>" class="btn btn-success"><i class="fas fa-pen"></i></i></a>
                    </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
<script src="../JS/validacion.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   
</html>