<?php include('controllers/connection.php');

$output= array();
$sql = "SELECT * FROM cpca ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',	
	1 => 'numero',
	2 => 'objetivo',
	3 => 'alcance',
	4 => 'personal',
	5 => 'proceso',
	6 => 'fecha',
	7 => 'estado',
	8 => 'porcentaje',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE numero like '%".$search_value."%'";
	$sql .= " OR objetivo like '%".$search_value."%'";
	$sql .= " OR alcance like '%".$search_value."%'";
	$sql .= " OR personal like '%".$search_value."%'";
	$sql .= " OR proceso like '%".$search_value."%'";
	$sql .= " OR fecha like '%".$search_value."%'";
	$sql .= " OR estado like '%".$search_value."%'";
	$sql .= " OR porcentaje like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['numero'];
	$sub_array[] = $row['objetivo'];
	$sub_array[] = $row['alcance'];
	$sub_array[] = $row['personal'];
	$sub_array[] = $row['proceso'];
	$sub_array[] = $row['fecha'];
	$sub_array[] = $row['estado'];
	$sub_array[] = $row['porcentaje'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-dark btn-sm editbtn" >Editar</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-warning btn-sm deleteBtn" >Borrar</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>$total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
