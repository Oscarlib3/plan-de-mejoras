<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("location: 404.php");
} else

    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['tipo_usuario'];

?>