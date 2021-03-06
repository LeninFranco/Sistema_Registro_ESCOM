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
        $sql = "INSERT INTO alumnos VALUES('$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$datos[11]','$datos[12]','$datos[13]','$datos[14]','$datos[15]','$datos[16]','$datos[17]','$datos[18]')";
        $result = mysqli_query($conn,$sql);
        if($result){
            for($i=1;$i<=18;$i++){
                $row = mysqli_query($conn,"SELECT count(boleta) as cupo FROM alumnoexamen WHERE codigo = $i GROUP BY codigo");
                $col = mysqli_fetch_assoc($row);
                if(isset($col['cupo'])){
                    if($col['cupo'] < 30){
                        $fila = mysqli_query($conn,"SELECT lab, horario FROM examenes WHERE codigo = $i");
                        $columnas = mysqli_fetch_array($fila);
                        $lab = $columnas['lab'];
                        $horario = $columnas['horario'];
                        $resultado = mysqli_query($conn,"INSERT INTO alumnoexamen VALUES('$datos[1]',$i)");
                        break;
                    }
                }
                if(!isset($col['cupo'])){
                    $fila = mysqli_query($conn,"SELECT lab, horario FROM examenes WHERE codigo = $i");
                    $columnas = mysqli_fetch_array($fila);
                    $lab = $columnas['lab'];
                    $horario = $columnas['horario'];
                    $resultado = mysqli_query($conn,"INSERT INTO alumnoexamen VALUES('$datos[1]',$i)");
                    break;
                }
            }
        }
        $_SESSION['color'] = "success";
        $_SESSION['message'] = "Alumno Guardado Correctamente";
        header("Location: ../crud.php");
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
                    <a href="../logout.php" class="nav-link">Cerrar Sesi??n</a>
                </li>
            </ul>
            <img src="../../img/logoESCOMBlanco.png" width="70px" height="60px">
        </div>
    </nav>
    <div class="container">
        <div class="row pt-4">
            <h2>A??adir Alumno</h2>
        </div>
        <div class="row pt-4">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <div class="card bg-primary">
                    <div class="card-header text-white">Identidad</div>
                        <div class="card-body bg-secondary">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <label>N??mero de Boleta</label>
                                    <input type="text" name="boleta" placeholder="N??mero de Boleta" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Nombre(s)</label>
                                    <input type="text" name="nombre" placeholder="Nombre(s)" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Apellido Paterno</label>
                                    <input type="text" name="apaterno" placeholder="Apellido Paterno" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Apellido Materno</label>
                                    <input type="text" name="amaterno" placeholder="Apellido Materno" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <label>Fecha de nacimiento</label>
                                    <input type="date" name="fecha" class="form-control" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>CURP</label>
                                    <input type="text" name="curp" placeholder="CURP" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Sexo</label>
                                    <br>
                                    <label for="Hombre"><input class="form-check-input" type="radio" value="Hombre" name="sexo" checked> Hombre</label>
                                    <label for="Mujer"><input class="form-check-input" type="radio" value="Mujer" name="sexo"> Mujer</label>
                                    <label for="Otro"><input class="form-check-input" type="radio" value="Otro" name="sexo"> Otro</label>
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
                                    <input type="text" name="calle" placeholder="Calle" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>No.</label>
                                    <input type="text" name="no" placeholder="No." class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Colonia</label>
                                    <input type="text" name="colonia" placeholder="Colonia" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>C??digo Postal (CP)</label>
                                    <input type="text" name="cp" placeholder="C??digo Postal" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <label>Alcald??a</label>
                                    <select class="form-select" name="alcaldia" required>
                                        <option value="??lvaro Obreg??n" selected>??lvaro Obreg??n</option>
                                        <option value="Azcapotzalco">Azcapotzalco</option>
                                        <option value="Benito Ju??rez">Benito Ju??rez</option>
                                        <option value="Coyoac??n">Coyoac??n</option>
                                        <option value="Cuajimalpa">Cuajimalpa</option>
                                        <option value="Cuauht??moc">Cuauht??moc</option>
                                        <option value="Gustavo A. Madero">Gustavo A. Madero</option>
                                        <option value="Iztacalco">Iztacalco</option>
                                        <option value="Iztapalapa">Iztapalapa</option>
                                        <option value="Magdalena Contreras">Magdalena Contreras</option>
                                        <option value="Miguel Hidalgo">Miguel Hidalgo</option>
                                        <option value="Milpa Alta">Milpa Alta</option>
                                        <option value="Tl??huac">Tl??huac</option>
                                        <option value="Tlalpan">Tlalpan</option>
                                        <option value="Venustiano Carranza">Venustiano Carranza</option>
                                        <option value="Xochimilco">Xochimilco</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Correo Electr??nico</label>
                                    <input type="text" name="correo" placeholder="Correo Electr??nico" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label>Tel??fono (Celular)</label>
                                    <input type="text" name="tel" placeholder="Numero de Tel??fono" class="form-control" required>
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
                                        <option value="CECyT 1 Gonzalo V??zquez Vela" selected>CECyT # 1: "Gonzalo V??zquez Vela"</option>
                                        <option value="CECyT 2 Miguel Bernard">CECyT # 2: "Miguel Bernard"</option>
                                        <option value="CECyT 3 Estanislao Ram??rez Ruiz">CECyT # 3: "Estanislao Ram??rez Ruiz"</option>
                                        <option value="CECyT 4 L??zaro C??rdenas">CECyT # 4: "L??zaro C??rdenas"</option>
                                        <option value="CECyT 5 Benito Ju??rez Garc??a">CECyT # 5: "Benito Ju??rez Garc??a"</option>
                                        <option value="CECyT 6 Miguel Oth??n de Mendiz??bal">CECyT # 6: "Miguel Oth??n de Mendiz??bal"</option>
                                        <option value="CECyT 7 Cuauht??moc">CECyT # 7: "Cuauht??moc"</option>
                                        <option value="CECyT 8 Narciso Bassols Garc??a">CECyT # 8: "Narciso Bassols Garc??a"</option>
                                        <option value="CECyT 9 Juan de Dios B??tiz">CECyT # 9: "Juan de Dios B??tiz"</option>
                                        <option value="CECyT 10 Carlos Vallejo M??rquez">CECyT # 10: "Carlos Vallejo M??rquez"</option>
                                        <option value="CECyT 11 Wilfrido Massieu P??rez">CECyT # 11: "Wilfrido Massieu P??rez"</option>
                                        <option value="CECyT 12 Jos?? Mar??a Morelos y Pav??n">CECyT # 12: "Jos?? Mar??a Morelos y Pav??n"</option>
                                        <option value="CECyT 13 Ricardo Flores Mag??n">CECyT # 13: "Ricardo Flores Mag??n"</option>
                                        <option value="CECyT 14 Luis Enrique Erro">CECyT # 14: "Luis Enrique Erro"</option>
                                        <option value="CECyT 15 Di??doro Ant??nez Echegaray">CECyT # 15: "Di??doro Ant??nez Echegaray"</option>
                                        <option value="CECyT 16 Hidalgo">CECyT # 16: "Hidalgo"</option>
                                        <option value="CECyT 17 Le??n Guanajuato">CECyT # 17: "Le??n Guanajuato"</option>
                                        <option value="CECyT 18 Zacatecas">CECyT # 18: "Zacatecas"</option>
                                        <option value="CECyT 19 Leona Vicario">CECyT # 19: "Leona Vicario"</option>
                                        <option value="CET 1 Walter Cross Buchanan">CET # 1 ???Walter Cross Buchanan???</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Entidad Federativa de Procedencia</label>
                                    <select name="estados" class="form-select">
                                        <option value="Aguascalientes" selected>Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Coahuila">Coahuila</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Ciudad de M??xico">Ciudad de M??xico</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="Estado de M??xico">Estado de M??xico</option>
                                        <option value="Michoac??n">Michoac??n</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo Le??n">Nuevo Le??n</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Quer??taro">Quer??taro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potos??">San Luis Potos??</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz">Veracruz</option>
                                        <option value="Yucat??n">Yucat??n</option>
                                        <option value="Zacatecas">Zacatecas</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Nombre de la escuela en caso de ser "Otro"</label>
                                    <input type="text" name="escuela" placeholder="Nombre de la escuela" class="form-control" disabled>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Promedio</label>
                                    <input type="number" step="0.01" name="promedio" value="5.00" min="5.00" max="10.00" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12"><label for="escoger">ESCOM fue tu:</label></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-12"><label for="Primera"><input class="form-check-input" type="radio" value="Primera" name="opcion" checked> Primera Opcion</label></div>
                                <div class="col-md-3 col-sm-12"><label for="Segunda"><input class="form-check-input" type="radio" value="Segunda" name="opcion"> Segunda Opcion</label></div>
                                <div class="col-md-3 col-sm-12"><label for="Tercera"><input class="form-check-input" type="radio" value="Tercera" name="opcion"> Tercera Opcion</label></div>
                                <div class="col-md-3 col-sm-12"><label for="Cuarta"><input class="form-check-input" type="radio" value="Cuarta" name="opcion"> Cuarta Opcion</label></div>
                            </div>
                        </div>
                </div>
                <br>
                <div class="d-grid">
                    <input type="submit" value="A??adir Alumno" name="guardar" class="btn btn-primary">
                    <br>
                    <input type="reset" value="Limpiar Campos" class="btn btn-primary">
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