<?php 
    session_start();
    if(!isset($_SESSION['password'])){
        header("Location: ../../index.html");
    }
    include("../../lib/db.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM alumnos WHERE boleta='".$id."'";
    $result = mysqli_query($conn,$sql);
    $_SESSION['color'] = "danger";
    $_SESSION['message'] = "Alumno Eliminado Correctamente";
    header("Location: ../crud.php");
?>