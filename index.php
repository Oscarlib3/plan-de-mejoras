<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Iniciar sesion PMBT</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 bg-dark text-white">
                                <div class="card-header text-center"><img src="img/logo-bt.png" alt="" width="200" height="90">
                                    <h3 class="text-center font-weight-light my-4">Iniciar sesion</h3>
                                    <h5 class="text-center">PMBT</h5>
                                </div>
                                <div class="card-body text-center ">
                                    <form method="POST" action="controllers/login.php">
                                        <div class="form-floating mb-3 text-dark">
                                            <input class="form-control" id="inputEmail" name="usuario" type="text" placeholder="bdtea00000" />
                                            <label for="inputEmail">Ingrese usuario</label>
                                        </div>
                                        <div class="form-floating mb-3 text-dark">
                                            <input class="form-control" id="inputPassword" name="password" type="password" placeholder="ingrese contraseña" />
                                            <label for="inputPassword">Ingrese contraseña</label>
                                        </div>
                                        <button type="submit" class=" btn btn-primary">Ingresar</button>
                                </div>
                                <?php
                                if (isset($_GET['errorpass']) and $_GET['errorpass'] == 'error') {
                                ?>
                                    <div class="alert alert-danger dismissible fade show text-center" role="alert">
                                        <strong>CONTRASEÑA INVALIDA</strong> vuelva a intentarlo

                                    </div>
                                <?php
                                }
                                ?>

                                <?php
                                if (isset($_GET['erroruser']) and $_GET['erroruser'] == 'error') {
                                ?>
                                    <div class="alert alert-warning dismissible fade show text-center" role="alert">
                                        <strong>USUARIO NO REGISTRADO</strong> vuelva a intentarlo

                                    </div>
                                <?php
                                }
                                ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">
            <div id="layoutAuthentication_footer">
                <footer class="py-1 bg-dark mt-auto fixed-bottom">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between strong">
                            <a class="footer-brand text-white text-decoration-none">
                                <img src="img/t-bt.png" alt="" width="40" height="50"><b> Banco del tesoro 2022</b></a>
                            <div>
                                <a class="text-white" href="#">Politica de privacidad</a>
                                &middot;
                                <a class="text-white" href="#">Terminos y Condiciones</a>
                            </div>
                        </div>
                    </div>
            </div>
            </footer>
        </div>
        </main>
    </div>
    </div>


</body>

</html>