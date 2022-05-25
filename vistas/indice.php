<?php include '../models/inic_sesion.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/styles.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/datatables-1.10.25.min.css" />
    <title>GERENCIA DE SEGURIDAD DE LA INFORMACION</title>
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon" />
</head>

<body class="bg-white">    
        <nav class="sb-nav-fixed navbar navbar-expand bg-dark py-1">
            <a class="navbar-brand" href="indice.php">
                <img src="../img/logo-bt.png" width="180" height="80" class="d-inline-block align-top" alt=""></a>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-5 my-2 my-md-3">
                <li class="nav-item dropdown">
                    <h5 class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo "Hola $nombre"; ?><i class="fas fa-users fa-fw"></i></h5>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="graficos.php">Grafica de avance de las coordinaciones</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li><a class="dropdown-item" href="../controllers/logout.php">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <main>
           
            <div class="row">
                <div class="container-fluid px-5 text-center">
                    <h1 class="mt-4">GERENCIA DE SEGURIDAD DE LA INFORMACION</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>                        
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card bg-danger mb-4" style="height: 14rem;">
                                <div class="card-body">
                                    <h3>COORDINACION DE MONITOREO Y RESPUESTAS DE INCIDENTES</h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-dark stretched-link " href="crmi.php">
                                        <h4>Ingresar</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card bg-primary mb-4" style="height: 14rem;">
                                <div class="card-body">
                                    <h3>COORDINACION DE ADMINISTRACION DE SEGURIDAD LOGICA</h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-dark stretched-link" href="casl.php">
                                        <h4>Ingresar</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card bg-warning mb-4" style="height: 14rem;">
                                <div class="card-body">
                                    <h3>COORDINACION DE PLANIFICACION Y CONTROL DE ACCESO</h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-dark stretched-link" href="cpca.php">
                                        <h4>Ingresar</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card bg-success mb-4" style="height: 14rem;">
                                <div class="card-body">
                                    <h3>COORDINACION DE GESTION DE SEGURIDAD DE INFORMACION Y CONTROL DE CAMBIO</h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-dark stretched-link" href="cgsicc.php">
                                        <h4>Ingresar</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
        </main>
        <script src="../js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
        <script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/dt-1.10.25datatables.min.js"></script>
        <?php include '../layouts/footer.php'; ?>
<