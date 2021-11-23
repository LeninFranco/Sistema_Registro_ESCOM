<?php 
    session_start();
    $password = $_POST['password'];
    if($password != "escomadmin"){
        $_SESSION['color'] = "danger";
        $_SESSION['message'] = "Clave Incorrecta";
        header("Location: index.php");
    }
    else{
        $_SESSION['password'] = $password;
        $_SESSION['color'] = "success";
        $_SESSION['message'] = "Acceso Permitido";
        header("Location: crud.php");
    }
?>