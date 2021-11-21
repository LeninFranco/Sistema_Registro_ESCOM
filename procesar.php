<?php
    session_start();
    $datos = $_SESSION['datos'];
    print_r($datos);
    session_unset();
?>