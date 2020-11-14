<?php


class TransaccionController
{
    public $FileHelper;

    function __construct()
    {
        $this->FileHelper = new JsonHelper();
    }

    public function Lista()
    {
        $Data = $this->FileHelper->ReadFile();
        require_once("core/views/Transaccion/Lista.php");
    }

    public function Ingresar()
    {
        if ($_POST) {

            $Transaccion = new TransaccionModel($_POST['monto'], $_POST['descripcion']);

            $this->FileHelper->SaveInFile($Transaccion);

            $Log = new LogModel("Agregado", $Transaccion->Id);

            $this->FileHelper->SaveLogInFile($Log);

            echo '
            <script>
                alert("Accion realizada exitosamente");
                window.location.assign("index.php");
            </script>';
        }
        require_once("core/views/Transaccion/Ingresar.php");
    }

    public function Editar()
    {
        $Transaccion = $this->FileHelper->RecordInFile($_GET["id"]);
        if ($_POST) {

            $DataActualizada = new TransaccionModel($_POST['monto'], $_POST['descripcion']);

            $this->FileHelper->EditInFile($_GET["id"], $DataActualizada);

            $Log = new LogModel("Editado", $Transaccion["Id"]);

            $this->FileHelper->SaveLogInFile($Log);

            echo '
            <script>
                alert("Accion realizada exitosamente");
                window.location.assign("index.php");
            </script>';
        }
        require_once("core/views/Transaccion/Editar.php");
    }

    public function Eliminar()
    {
        if ($_POST) {
            $Transaccion = $this->FileHelper->RecordInFile($_GET["id"]);

            $this->FileHelper->DeleteInFile($_POST["id"]);

            $Log = new LogModel("Eliminado", $Transaccion["Id"]);

            $this->FileHelper->SaveLogInFile($Log);

            echo '
            <script>
                alert("Accion realizada exitosamente");
                window.location.assign("index.php");
            </script>';
        }
        require_once("core/views/Transaccion/Eliminar.php");
    }

    public function Importar()
    {
        if ($_FILES["file"]) {
            

            $this->FileHelper->ImportFile();

            $TransaccionJSONTemporal = file_get_contents("./data/TransaccionJSONTemporal.json");
            $DataSubida  = json_decode($TransaccionJSONTemporal, true);
            $cont = 0;
            foreach ($DataSubida as $key => $value) {
                $cont = $cont + 1;
            }
            $Log = new LogModel("Se importaron " . $cont . " Transacciones", 'XXXXXXXXXX');
            $this->FileHelper->SaveLogInFile($Log);

            echo '
            <script>
                alert("Accion realizada exitosamente");
                window.location.assign("index.php");
            </script>';
        }
        require_once("core/views/Transaccion/Importar.php");
    }

    public function Historial()
    {
        $Data = $this->FileHelper->ReadLogFile();
        require_once("core/views/Transaccion/Historial.php");
    }
}
