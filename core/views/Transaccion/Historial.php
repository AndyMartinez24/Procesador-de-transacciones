<div class="container">
    <section>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Fecha y hora</th>
                    <th scope="col">Id de la transaccion afectada</th>
                    <th scope="col">Accion realizada</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($Data != null) {

                    krsort($Data);

                    foreach ($Data as $key => $value) {
                        echo '
                        <tr>
                            <th>' . $key . '</th>
                            <th>' . $value['Fecha']  . '</th>
                            <th>' . $value['IdTransaccion']  . '</th>
                            <th>' . $value['AccionRealizada']  . '</th>
                        </tr>
                        ';
                    }
                }
                ?>
            </tbody>
        </table>
    </section>
</div>