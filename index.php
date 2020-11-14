<!DOCTYPE html>
<html lang="en">

    
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PlatinumPlace</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<!-- CSS para empujar el footer hasta el fondo -->
<style>
    html {
        min-height: 100%;
        position: relative;
    }

    body {
        margin: 0;
        margin-bottom: 40px;
    }

    footer {
        background-color: black;
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 40px;
        color: white;
    }
</style>


<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php">Procesador de transacciones</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" style="padding:10px">
                        <a href="index.php?controller=TransaccionController&action=Ingresar" role="button" class="btn btn-outline-success">Ingresar transaccion</a>
                    </li>
                    <li class="nav-item" style="padding:10px">
                        <a role="button" class="btn btn-outline-primary" href="index.php?controller=TransaccionController&action=Historial">Historial</a>
                    </li>
                    <li class="nav-item dropdown" style="padding:10px">
                        <a class="btn btn-outline-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Transacciones
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="index.php?controller=TransaccionController&action=Importar" class="dropdown-item">Importar</a>
                            <div class="dropdown-divider"></div>
                            <a href="core/views/Transaccion/Exportar.php?modo=json" class="dropdown-item">Exportar en Json</a>
                            <div class="dropdown-divider"></div>
                            <a href="core/views/Transaccion/Exportar.php?modo=csv" class="dropdown-item">Exportar en CSV</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <!-- Contenido de las vistas  -->
    <?php require_once("core/router.php") ?>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; PlatinumPlace <?php echo date('Y') ?></p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

</body>

</html>
