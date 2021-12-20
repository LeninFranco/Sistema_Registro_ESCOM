<?php 
    session_start();
    if(!isset($_SESSION['password'])){
        header("Location: ../../index.html");
    }
    include("../../lib/db.php");
    if(isset($_POST['guardar'])){
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
        $datos = array(
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
        $sql = "UPDATE alumnos SET nombre='$datos[2]', aPaterno='$datos[3]', aMaterno='$datos[4]', nacimiento='$datos[5]', curp='$datos[6]', sexo='$datos[7]', calle='$datos[8]', no='$datos[9]', colonia='$datos[10]', cp='$datos[11]', alcaldia='$datos[12]', correo='$datos[13]', telefono='$datos[14]', escuela='$datos[15]', entidad='$datos[16]', promedio='$datos[17]', opcion='$datos[18]' WHERE boleta='$datos[1]'";
        $result = mysqli_query($conn,$sql);
        $_SESSION['color'] = "success";
        $_SESSION['message'] = "Alumno Modificado Correctamente";
        header("Location: ../crud.php");
    }
    else{
        $id = $_GET['id'];
        $sql = "SELECT * FROM alumnos WHERE boleta='".$id."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
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
            <a href="../crud.php" class="navbar-brand">ESCOM | IPN</a>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="../logout.php" class="nav-link">Cerrar Sesión</a>
                </li>
            </ul>
            <img src="../../img/logoESCOMBlanco.png" width="70px" height="60px">
        </div>
    </nav>
    <div class="container">
        <div class="row pt-4">
            <h2>Modificar Alumno</h2>
        </div>
        <div class="row pt-4">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <div class="card bg-primary">
                    <div class="card-header text-white">Identidad</div>
                        <div class="card-body bg-secondary">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <label>Número de Boleta</label>
                                    <input type="text" name="boleta" value="<?php if(isset($row)) echo $row['boleta']; ?>" placeholder="Número de Boleta" class="form-control" readonly required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Nombre(s)</label>
                                    <input type="text" name="nombre" value="<?php if(isset($row)) echo $row['nombre']; ?>" placeholder="Nombre(s)" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Apellido Paterno</label>
                                    <input type="text" name="apaterno" value="<?php if(isset($row)) echo $row['aPaterno']; ?>" placeholder="Apellido Paterno" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Apellido Materno</label>
                                    <input type="text" name="amaterno" value="<?php if(isset($row)) echo $row['aMaterno']; ?>" placeholder="Apellido Materno" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <label>Fecha de nacimiento</label>
                                    <input type="date" name="fecha" value="<?php if(isset($row)) echo $row['nacimiento']; ?>" class="form-control" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>CURP</label>
                                    <input type="text" name="curp" value="<?php if(isset($row)) echo $row['curp']; ?>" placeholder="CURP" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Sexo</label>
                                    <br>
                                    <label for="Hombre"><input class="form-check-input" type="radio" value="Hombre" name="sexo" <?php if($row['sexo'] == "Hombre") echo "checked"; ?>> Hombre</label>
                                    <label for="Mujer"><input class="form-check-input" type="radio" value="Mujer" name="sexo" <?php if($row['sexo'] == "Mujer") echo "checked"; ?>> Mujer</label>
                                    <label for="Otro"><input class="form-check-input" type="radio" value="Otro" name="sexo" <?php if($row['sexo'] == "Otro") echo "checked"; ?>> Otro</label>
                                </div>
                            </div>
                        </div>
                </div>
                <br>
                <div class="card bg-primary">
                    <div class="card-header text-white">Contacto</div>
                        <div class="card-body bg-secondary">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <label>Calle</label>
                                    <input type="text" value="<?php if(isset($row)) echo $row['calle']; ?>" name="calle" placeholder="Calle" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>No.</label>
                                    <input type="text" value="<?php if(isset($row)) echo $row['no']; ?>" name="no" placeholder="No." class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Colonia</label>
                                    <input type="text" value="<?php if(isset($row)) echo $row['colonia']; ?>" name="colonia" placeholder="Colonia" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Código Postal (CP)</label>
                                    <input type="text" value="<?php if(isset($row)) echo $row['cp']; ?>" name="cp" placeholder="Código Postal" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <label>Alcaldía</label>
                                    <select class="form-select" name="alcaldia" required>
                                        <option value="Álvaro Obregón" <?php if($row['alcaldia'] == "Álvaro Obregón") echo "selected"; ?>>Álvaro Obregón</option>
                                        <option value="Azcapotzalco" <?php if($row['alcaldia'] == "Azcapotzalco") echo "selected"; ?>>Azcapotzalco</option>
                                        <option value="Benito Juárez" <?php if($row['alcaldia'] == "Benito Juárez") echo "selected"; ?>>Benito Juárez</option>
                                        <option value="Coyoacán" <?php if($row['alcaldia'] == "Coyoacán") echo "selected"; ?>>Coyoacán</option>
                                        <option value="Cuajimalpa" <?php if($row['alcaldia'] == "Cuajimalpa") echo "selected"; ?>>Cuajimalpa</option>
                                        <option value="Cuauhtémoc" <?php if($row['alcaldia'] == "Cuauhtémoc") echo "selected"; ?>>Cuauhtémoc</option>
                                        <option value="Gustavo A. Madero" <?php if($row['alcaldia'] == "Gustavo A. Madero") echo "selected" ?>>Gustavo A. Madero</option>
                                        <option value="Iztacalco" <?php if($row['alcaldia'] == "Iztacalco") echo "selected"; ?>>Iztacalco</option>
                                        <option value="Iztapalapa" <?php if($row['alcaldia'] == "Iztapalapa") echo "selected"; ?>>Iztapalapa</option>
                                        <option value="Magdalena Contreras" <?php if($row['alcaldia'] == "Magdalena Contreras") echo "selected"; ?>>Magdalena Contreras</option>
                                        <option value="Miguel Hidalgo" <?php if($row['alcaldia'] == "Miguel Hidalgo") echo "selected"; ?>>Miguel Hidalgo</option>
                                        <option value="Milpa Alta" <?php if($row['alcaldia'] == "Milpa Alta") echo "selected"; ?>>Milpa Alta</option>
                                        <option value="Tláhuac" <?php if($row['alcaldia'] == "Tláhuac") echo "selected"; ?>>Tláhuac</option>
                                        <option value="Tlalpan" <?php if($row['alcaldia'] == "Tlalpan") echo "selected"; ?>>Tlalpan</option>
                                        <option value="Venustiano Carranza" <?php if($row['alcaldia'] == "Venustiano Carranza") echo "selected"; ?>>Venustiano Carranza</option>
                                        <option value="Xochimilco" <?php if($row['alcaldia'] == "Xochimilco") echo "selected"; ?>>Xochimilco</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Correo Electrónico</label>
                                    <input type="text" value="<?php if(isset($row)) echo $row['correo']; ?>" name="correo" placeholder="Correo Electronico" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Télefono (Celular)</label>
                                    <input type="text" value="<?php if(isset($row)) echo $row['telefono']; ?>" name="tel" placeholder="Numero de Telefono" class="form-control" required>
                                </div>
                            </div>
                        </div>
                </div>
                <br>
                <div class="card bg-primary">
                    <div class="card-header text-white">Procedencia</div>
                        <div class="card-body bg-secondary">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Escuela de Procedencia</label>
                                    <select class="form-select" name="cecyts" onchange="cambio(this)">
                                        <option value="otro">Otro</option>
                                        <option value="CECyT 1 Gonzalo Vázquez Vela" <?php if($row['escuela'] == "CECyT 1 Gonzalo Vázquez Vela") echo "selected"; ?>>CECyT # 1: "Gonzalo Vázquez Vela"</option>
                                        <option value="CECyT 2 Miguel Bernard"<?php if($row['escuela'] == "CECyT 2 Miguel Bernard") echo "selected"; ?>>CECyT # 2: "Miguel Bernard"</option>
                                        <option value="CECyT 3 Estanislao Ramírez Ruiz"<?php if($row['escuela'] == "CECyT 3 Estanislao Ramírez Ruiz") echo "selected"; ?>>CECyT # 3: "Estanislao Ramírez Ruiz"</option>
                                        <option value="CECyT 4 Lázaro Cárdenas"<?php if($row['escuela'] == "CECyT 4 Lázaro Cárdenas") echo "selected"; ?>>CECyT # 4: "Lázaro Cárdenas"</option>
                                        <option value="CECyT 5 Benito Juárez García"<?php if($row['escuela'] == "CECyT 5 Benito Juárez García") echo "selected"; ?>>CECyT # 5: "Benito Juárez García"</option>
                                        <option value="CECyT 6 Miguel Othón de Mendizábal"<?php if($row['escuela'] == "CECyT 6 Miguel Othón de Mendizábal") echo "selected"; ?>>CECyT # 6: "Miguel Othón de Mendizábal"</option>
                                        <option value="CECyT 7 Cuauhtémoc"<?php if($row['escuela'] == "CECyT 7 Cuauhtémoc") echo "selected" ?>>CECyT # 7: "Cuauhtémoc"</option>
                                        <option value="CECyT 8 Narciso Bassols García"<?php if($row['escuela'] == "CECyT 8 Narciso Bassols García") echo "selected"; ?>>CECyT # 8: "Narciso Bassols García"</option>
                                        <option value="CECyT 9 Juan de Dios Bátiz"<?php if($row['escuela'] == "CECyT 9 Juan de Dios Bátiz") echo "selected"; ?>>CECyT # 9: "Juan de Dios Bátiz"</option>
                                        <option value="CECyT 10 Carlos Vallejo Márquez"<?php if($row['escuela'] == "CECyT 10 Carlos Vallejo Márquez") echo "selected"; ?>>CECyT # 10: "Carlos Vallejo Márquez"</option>
                                        <option value="CECyT 11 Wilfrido Massieu Pérez"<?php if($row['escuela'] == "CECyT 11 Wilfrido Massieu Pérez") echo "selected"; ?>>CECyT # 11: "Wilfrido Massieu Pérez"</option>
                                        <option value="CECyT 12 José María Morelos y Pavón"<?php if($row['escuela'] == "CECyT 12 José María Morelos y Pavón") echo "selected"; ?>>CECyT # 12: "José María Morelos y Pavón"</option>
                                        <option value="CECyT 13 Ricardo Flores Magón"<?php if($row['escuela'] == "CECyT 13 Ricardo Flores Magón") echo "selected"; ?>>CECyT # 13: "Ricardo Flores Magón"</option>
                                        <option value="CECyT 14 Luis Enrique Erro"<?php if($row['escuela'] == "CECyT 14 Luis Enrique Erro") echo "selected"; ?>>CECyT # 14: "Luis Enrique Erro"</option>
                                        <option value="CECyT 15 Diódoro Antúnez Echegaray"<?php if($row['escuela'] == "CECyT 15 Diódoro Antúnez Echegaray") echo "selected"; ?>>CECyT # 15: "Diódoro Antúnez Echegaray"</option>
                                        <option value="CECyT 16 Hidalgo"<?php if($row['escuela'] == "CECyT 16 Hidalgo") echo "selected"; ?>>CECyT # 16: "Hidalgo"</option>
                                        <option value="CECyT 17 León Guanajuato"<?php if($row['escuela'] == "CECyT 17 León Guanajuato") echo "selected"; ?>>CECyT # 17: "León Guanajuato"</option>
                                        <option value="CECyT 18 Zacatecas"<?php if($row['escuela'] == "CECyT 18 Zacatecas") echo "selected"; ?>>CECyT # 18: "Zacatecas"</option>
                                        <option value="CECyT 19 Leona Vicario"<?php if($row['escuela'] == "CECyT 19 Leona Vicario") echo "selected"; ?>>CECyT # 19: "Leona Vicario"</option>
                                        <option value="CET 1 Walter Cross Buchanan"<?php if($row['escuela'] == "CET 1 Walter Cross Buchanan") echo "selected"; ?>>CET # 1 “Walter Cross Buchanan”</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Entidad Federativa de Procedencia</label>
                                    <select name="estados" class="form-select">
                                        <option value="Aguascalientes" <?php if($row['entidad'] == "Aguascalientes") echo "selected"; ?>>Aguascalientes</option>
                                        <option value="Baja California" <?php if($row['entidad'] == "Baja California") echo "selected"; ?>>Baja California</option>
                                        <option value="Baja California Sur" <?php if($row['entidad'] == "Baja California Sur") echo "selected"; ?>>Baja California Sur</option>
                                        <option value="Campeche" <?php if($row['entidad'] == "Campeche") echo "selected"; ?>>Campeche</option>
                                        <option value="Chiapas" <?php if($row['entidad'] == "Chiapas") echo "selected"; ?>>Chiapas</option>
                                        <option value="Chihuahua" <?php if($row['entidad'] == "Chihuahua") echo "selected"; ?>>Chihuahua</option>
                                        <option value="Coahuila" <?php if($row['entidad'] == "Coahuila") echo "selected"; ?>>Coahuila</option>
                                        <option value="Colima" <?php if($row['entidad'] == "Colima") echo "selected"; ?>>Colima</option>
                                        <option value="Ciudad de México" <?php if($row['entidad'] == "Ciudad de México") echo "selected"; ?>>Ciudad de México</option>
                                        <option value="Durango" <?php if($row['entidad'] == "Durango") echo "selected" ?>>Durango</option>
                                        <option value="Guanajuato" <?php if($row['entidad'] == "Guanajuato") echo "selected"; ?>>Guanajuato</option>
                                        <option value="Guerrero" <?php if($row['entidad'] == "Guerrero") echo "selected"; ?>>Guerrero</option>
                                        <option value="Hidalgo" <?php if($row['entidad'] == "Hidalgo") echo "selected"; ?>>Hidalgo</option>
                                        <option value="Jalisco" <?php if($row['entidad'] == "Jalisco") echo "selected"; ?>>Jalisco</option>
                                        <option value="Estado de México" <?php if($row['entidad'] == "Estado de México") echo "selected"; ?>>Estado de México</option>
                                        <option value="Michoacán" <?php if($row['entidad'] == "Michoacán") echo "selected"; ?>>Michoacán</option>
                                        <option value="Morelos" <?php if($row['entidad'] == "Morelos") echo "selected"; ?>>Morelos</option>
                                        <option value="Nayarit" <?php if($row['entidad'] == "Nayarit") echo "selected"; ?>>Nayarit</option>
                                        <option value="Nuevo León" <?php if($row['entidad'] == "Nuevo León") echo "selected"; ?>>Nuevo León</option>
                                        <option value="Oaxaca" <?php if($row['entidad'] == "Oaxaca") echo "selected"; ?>>Oaxaca</option>
                                        <option value="Puebla" <?php if($row['entidad'] == "Puebla") echo "selected"; ?>>Puebla</option>
                                        <option value="Querétaro" <?php if($row['entidad'] == "Querétaro") echo "selected"; ?>>Querétaro</option>
                                        <option value="Quintana Roo" <?php if($row['entidad'] == "Quintana Roo") echo "selected"; ?>>Quintana Roo</option>
                                        <option value="San Luis Potosí" <?php if($row['entidad'] == "San Luis Potosí") echo "selected"; ?>>San Luis Potosí</option>
                                        <option value="Sinaloa" <?php if($row['entidad'] == "Sinaloa") echo "selected"; ?>>Sinaloa</option>
                                        <option value="Sonora" <?php if($row['entidad'] == "Sonora") echo "selected"; ?>>Sonora</option>
                                        <option value="Tabasco" <?php if($row['entidad'] == "Tabasco") echo "selected"; ?>>Tabasco</option>
                                        <option value="Tamaulipas" <?php if($row['entidad'] == "Tamaulipas") echo "selected"; ?>>Tamaulipas</option>
                                        <option value="Tlaxcala" <?php if($row['entidad'] == "Tlaxcala") echo "selected"; ?>>Tlaxcala</option>
                                        <option value="Veracruz" <?php if($row['entidad'] == "Veracruz") echo "selected"; ?>>Veracruz</option>
                                        <option value="Yucatán" <?php if($row['entidad'] == "Yucatán") echo "selected"; ?>>Yucatán</option>
                                        <option value="Zacatecas" <?php if($row['entidad'] == "Zacatecas") echo "selected"; ?>>Zacatecas</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Nombre de la escuela en caso de ser "Otro"</label>
                                    <input type="text" value="<?php if(isset($row)) echo $row['escuela']; ?>" name="escuela" placeholder="Nombre de la escuela" class="form-control">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Promedio</label>
                                    <input type="number" step="0.01" name="promedio" value="<?php if(isset($row)) echo $row['promedio']; ?>" min="5.00" max="10.00" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12"><label for="escoger">ESCOM fue tu:</label></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-12"><label for="Primera"><input class="form-check-input" type="radio" value="Primera" name="opcion" <?php if($row['opcion'] == "Primera") echo "checked"; ?>> Primera Opcion</label></div>
                                <div class="col-md-3 col-sm-12"><label for="Segunda"><input class="form-check-input" type="radio" value="Segunda" name="opcion" <?php if($row['opcion'] == "Segunda") echo "checked"; ?>> Segunda Opcion</label></div>
                                <div class="col-md-3 col-sm-12"><label for="Tercera"><input class="form-check-input" type="radio" value="Tercera" name="opcion" <?php if($row['opcion'] == "Tercera") echo "checked"; ?>> Tercera Opcion</label></div>
                                <div class="col-md-3 col-sm-12"><label for="Cuarta"><input class="form-check-input" type="radio" value="Cuarta" name="opcion" <?php if($row['opcion'] == "Cuarta") echo "checked"; ?>> Cuarta Opcion</label></div>
                            </div>
                        </div>
                </div>
                <br>
                <div class="d-grid">
                    <input type="submit" value="Modificar Alumno" name="guardar" class="btn btn-primary">
                    <br>
                    <a href="../crud.php" class="btn btn-primary">Regresar</a>
                </div>
                <br>
            </form>
        </div>
    </div>
</body>
<script src="../../JS/validacion.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   
</html>