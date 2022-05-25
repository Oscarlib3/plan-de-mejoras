<!DOCTYPE html>
<html lang="es">
<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/datatables-1.10.25.min.css" />
  <title>PLAN DE MEJORAS</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon" />
 </head>

	<body>
	<class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand bg-dark py-1">
			<a class= "navbar-brand" href="../vistas/indice.php">
			<img src ="../img/logo-bt.png" width="180" height= "80" class="d-inline-block align-top" alt=""></a>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-5 my-2 my-md-3">
                <li class="nav-item dropdown">
                    <h5 class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo "Hola $nombre";?><i class="fas fa-users fa-fw"></i></h5>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						
                        <li><a class="dropdown-item" href="../controllers/logout.php">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>