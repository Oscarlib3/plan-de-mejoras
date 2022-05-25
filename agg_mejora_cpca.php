<?php 
include('controllers/connection.php');
$numero = $_POST['numero'];
$objetivo = $_POST['objetivo'];
$alcance = $_POST['alcance'];
$personal = $_POST['personal'];
$proceso = $_POST['proceso'];
$fecha = $_POST['fecha'];
$estado = $_POST['estado'];
$porcentaje = $_POST['porcentaje'];

$sql = "INSERT INTO `cpca` (`numero`,`objetivo`,`alcance`,`personal`,`proceso`,`fecha`,`estado`,`porcentaje`) values ('$numero','$objetivo','$alcance','$personal','$proceso','$fecha','$estado','$porcentaje' )";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>