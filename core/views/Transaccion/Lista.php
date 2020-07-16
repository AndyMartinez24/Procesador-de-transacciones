<section>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Fecha y hora</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($Data != null) {
                    krsort($Data);

                    foreach ($Data as $key => $value) {
                        echo '
                            <tr>
                                <th>' . $value['Id']  . '</th>
                                <th>' . $value['Fecha']  . '</th>
                                <th>' . $value['Monto']  . '</th>
                                <th>' . $value['Descripcion']  . '</th>
                                <td>
                                    <a href="index.php?controller=TransaccionController&action=Editar&id=' . $key . '" class="btn btn-sm btn-outline-warning">Editar</a>|
                                    <a href="index.php?controller=TransaccionController&action=Eliminar&id=' . $key . '" class="btn btn-sm btn-outline-danger">Borrar</a>
                                </td>
                            </tr>
                            ';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</section>