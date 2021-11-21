<?php
    session_start();
    $boleta = $_POST['boleta'];
    $nombre = $_POST['nombre'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $fecha = $_POST['fecha'];
    $curp = $_POST['curp'];
    $sexo = $_POST['sexo'];
    $calle = $_POST['calle'];
    $no = $_POST['no'];
    $colonia = $_POST['colonia'];
    $cp = $_POST['cp'];
    $alcaldia = $_POST['alcaldia'];
    $correo = $_POST['correo'];
    $tel = $_POST['tel'];
    if(isset($_POST['escuela'])){
        $escuela = $_POST['escuela'];
    }
    else{
        $escuela = $_POST['cecyts'];
    }
    $estado = $_POST['estados'];
    $promedio = $_POST['promedio'];
    $opcion = $_POST['opcion'];
    $miArray = array(
        1 => $boleta,
        2 => $nombre,
        3 => $apaterno,
        4 => $amaterno,
        5 => $fecha,
        6 => $curp,
        7 => $sexo,
        8 => $calle,
        9 => $no,
        10 => $colonia,
        11 => $cp,
        12 => $alcaldia,
        13 => $correo,
        14 => $tel,
        15 => $escuela,
        16 => $estado,
        17 => $promedio,
        18 => $opcion
    );
    $_SESSION['datos'] = $miArray;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: Registro Nuevo Ingreso :.</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://bootswatch.com/5/zephyr/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">ESCOM | IPN</a>
            <img src="img/logoESCOMBlanco.png" width="70px" height="60px">
        </div>
    </nav>
    <div class="container">
        <div class="row pt-4">
            <div class="col-12">
                <h1 align="center">Hola <?php echo $nombre ?>, verifica que los datos que ingrsaste sean correctos</h1>
            </div>
            <div class="col-4 pt-2">
                <h2>Datos de Identidad</h2>
                <p><strong>No. Boleta: </strong> <?php echo $boleta ?></p>
                <p><strong>Nombre(s): </strong> <?php echo $nombre ?></p>
                <p><strong>Apellido Paterno: </strong> <?php echo $apaterno ?></p>
                <p><strong>Apellido Materno: </strong> <?php echo $amaterno ?></p>
                <p><strong>Fecha de Nacimiento: </strong> <?php echo $fecha ?></p>
                <p><strong>CURP: </strong> <?php echo $curp ?></p>
                <p><strong>Sexo: </strong> <?php echo $sexo ?></p>
            </div>
            <div class="col-4 pt-2">
                <h2>Datos de Contacto</h2>
                <p><strong>Calle </strong> <?php echo $calle ?></p>
                <p><strong>No: </strong> <?php echo $no ?></p>
                <p><strong>Colonia: </strong> <?php echo $colonia ?></p>
                <p><strong>Codigo Postal: </strong> <?php echo $cp ?></p>
                <p><strong>Alcaldia: </strong> <?php echo $alcaldia ?></p>
                <p><strong>Correo Electronico: </strong> <?php echo $correo ?></p>
                <p><strong>Numero de Telefono: </strong> <?php echo $tel ?></p>
            </div>
            <div class="col-4 pt-2">
                <h2>Datos de Procedencia</h2>
                <p><strong>Escuela de Procedencia: </strong> <?php echo $escuela ?></p>
                <p><strong>Entidad Federativa de Procedencia: </strong> <?php echo $estado ?></p>
                <p><strong>Promedio: </strong> <?php echo $promedio ?></p>
                <p><strong>ESCOM fue tu: </strong> <?php echo $opcion ?> opcion</p>
            </div>
            <div class="d-grid">
                <input type="button" value="Modificar" class="btn btn-primary" onclick="retornar()">
                <br>
                <a href="procesar.php" class="btn btn-primary" target="_blank">Confirmar</a>
                <br>
            </div>
        </div>
    </div>
</body>
<script src="JS/retorno.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   
</html>