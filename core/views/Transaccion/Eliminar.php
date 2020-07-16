<header class="jumbotron my-4 text-center">

    <h1 class="display-3">Estas seguro de continuar?</h1>

    <form action="index.php?controller=TransaccionController&action=Eliminar&id=<?= $_GET['id'] ?>" method="POST">

        <input type="text" value='<?php echo $_GET['id'] ?>' name="id" hidden>

        <a href="index.php" class="btn btn-success btn-lg">Regresar a inicio</a>|

        <button type="submit" class="btn btn-danger btn-lg">Eliminar</button>

    </form>

</header>