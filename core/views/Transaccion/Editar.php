<div class="container">
    <section>
        <form method="POST" action="index.php?controller=TransaccionController&action=Editar&id=<?= $_GET["id"] ?> ">
            <div class="form-group">
                <h3>Transaccion Id <?= $Transaccion["Id"] ?></h3>
            </div>
            <div class="form-group">
                <label>Monto</label>
                <input type="number" min="1" step="any" class="form-control" name="monto" value="<?= $Transaccion["Monto"] ?>">
            </div>
            <div class="form-group">
                <label>Porque va a realizar esta transacción?</label>
                <textarea class="form-control" rows="3" name="descripcion"><?= $Transaccion["Descripcion"] ?></textarea>
            </div>
            <button type="submit" class="btn btn-outline-primary">Ingresar</button>
            <a href="index.php" class="btn btn-outline-success">Regresar a inicio</a>
        </form>
    </section>
</div>