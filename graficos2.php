<?php include('models/inic_sesion1.php'); ?>
<?php
header('Content-type: application/json');
require 'conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$result = array();

$consulta = "SELECT objetivo, sum(porcentaje) FROM cpca GROUP BY objetivo ORDER BY sum(porcentaje) DESC";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
    array_push($result, array($fila["objetivo"], $fila["sum(porcentaje)"] ));
}

print json_encode($result, JSON_NUMERIC_CHECK);
$conexion=null;