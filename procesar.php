<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'lib/PHPMailer/src/Exception.php';
    require 'lib/PHPMailer/src/PHPMailer.php';
    require 'lib/PHPMailer/src/SMTP.php';
    require 'lib/fpdf/fpdf.php'; 

    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('img/logo.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',22);
        // Movernos a la derecha
        $this->Cell(55);
        // Título
        $this->Cell(80,10,'Ficha de registro',1,0,'C');
    
        $this->Image('img/logo1.png',160,8,33);
        // Salto de línea
        $this->Ln(30);
    
    }
    
    //Tabla
    function BasicTable($header, $campos, $datos)
    {   
        // Cabecera
        foreach($header as $col)
            $this->Cell(90,10,$col,1);
        $this->Ln();
        // Datos

        $i = 1;
        foreach($campos as $row)
        {
            $this->Cell(90,10,$row,1,0,'C');
            $str = utf8_decode($datos[$i++]);
            $this->Cell(90,10,$str,1,0,'C');
            $this->Ln();
        }
    }
    
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }
?>


<?php
    session_start();   

    include("lib/db.php");

    //Guardamos al alumno en la base de datos
    $datos = $_SESSION['datos'];
    $sql = "INSERT INTO alumnos VALUES('$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$datos[11]','$datos[12]','$datos[13]','$datos[14]','$datos[15]','$datos[16]','$datos[17]','$datos[18]')";
    $result = mysqli_query($conn,$sql);

    //Asignamos una sede y horario al alumno

    $lab = "";
    $horario = "";

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

    //Generamos el PDF y 
    
    $pdf = new PDF();

    $header = array('Campo', 'Datos usuario');
    $campos = array('No de boleta','Nombre','Apelido paterno','Apellido Materno','Fecha de nacimiento','CURP','Sexo','Calle','No','Colonia','CP','Alcaldia','Email','Telefono','Escuela','Entidad Federativa','Promedio','No opcion');

    $data = array('5555','juan');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    $pdf->BasicTable($header,$campos,$datos);
    $pdf->SetFont('Times','B',15);
    $pdf->Write(10,"Sede: $lab\n");
    $pdf->Write(10,"Fecha y Horario: $horario\n");
    $pdf->Close();
    $file = basename('ficha_registro_escom');
    $file .= '.pdf';
    $pdf->Output($file, 'F');
    
    //Enviar por correo
    
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();       
        $mail->CharSet = 'UTF-8';                                //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'escomequipo1@gmail.com';                     //SMTP username
        $mail->Password   = 'escombros';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('escomequipo1@gmail.com', 'ESCOM');
        $mail->addAddress($datos[13]);     //Add a recipient

        //Attachments
        $mail->addAttachment('ficha_registro_escom.pdf');         //Add attachments

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Ficha de Registro';
        $mail->Body    = 'Se anexa el documento PDF con sus datos de registro, asi como la sede y fecha de su examen de admisión';

        $mail->send();
        unlink('ficha_registro_escom.pdf');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    session_unset();
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
            <a href="index.html" class="navbar-brand">ESCOM | IPN</a>
            <img src="img/logoESCOMBlanco.png" width="70px" height="60px">
        </div>
    </nav>
    <div class="container">
        <div class="row pt-4" style="text-align: center;">
            <?php if (!$result) { ?>
                <h1>¡Ya tenemos tu registro!</h1>
                <h3>Espera tu correo electronico</h3>
                <img src="img/burrito-bad.png" style="width: 200px; height: 250px; display:block; margin:auto;">
            <?php } ?>
            <?php if ($result) { ?>
                <h1>¡Gracias por registrarte!</h1>
                <h3>Sus datos fueron almacenados correctamente</h3>
                <h3>Le enviamos un correo electronico con la fecha y sede de su examen diagnostico</h3>
                <img src="img/burrito-nice.png" style="width: 250px; height: 200px; display:block; margin:auto;">
            <?php } ?>
        </div>
    </div>
</body>
<script src="JS/retorno.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   
</html>