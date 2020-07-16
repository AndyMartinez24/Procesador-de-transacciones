<?php
class JsonHelper
{
    public $directorio = "./data/TransaccionJSON.json";

    function __construct()
    {
        if (!file_exists("./data")) {
            mkdir("./data", 0777, true);
        }
    }

    public function SaveInFile($transaccion)
    {
        // Toma el json actual
        $TransaccionJSON = file_get_contents($this->directorio);

        // Lo convierte a un array asociativo
        $DataActual  = json_decode($TransaccionJSON, true);

        // Pasa el objeto al la ultima posicion del array
        $DataActual[] = $transaccion;

        // Conviente el array en un json
        $DataActualizada = json_encode($DataActual);


        // Sobreescribe el json donde se guardan los datos
        file_put_contents($this->directorio, $DataActualizada);
    }

    public function ReadFile()
    {

        $TransaccionJSON = array();
        if (file_exists($this->directorio)) {
            $TransaccionJSON = file_get_contents($this->directorio);
            $DataActual  = json_decode($TransaccionJSON, true);
            return $DataActual;
        } else {
            return $TransaccionJSON;
        }
    }

    public function RecordInFile($id)
    {
        $TransaccionJSON = file_get_contents($this->directorio);

        $DataActual  = json_decode($TransaccionJSON, true);

        return $DataActual[$id];
    }

    public function EditInFile($id, $transaccion)
    {
        $TransaccionJSON = file_get_contents($this->directorio);

        $DataActual  = json_decode($TransaccionJSON, true);

        unset($DataActual[$id]);

        $DataActual[$id] = $transaccion;

        $DataActualizada = json_encode($DataActual);

        file_put_contents($this->directorio, $DataActualizada);
    }

    public function DeleteInFile($id)
    {
        $TransaccionJSON = file_get_contents($this->directorio);

        $DataActual  = json_decode($TransaccionJSON, true);

        unset($DataActual[$id]);

        $DataActualizada = json_encode($DataActual);

        file_put_contents($this->directorio, $DataActualizada);
    }

    public function SaveLogInFile($log)
    {
        $LogJSON = file_get_contents("./data/Log.json");

        $DataActual  = json_decode($LogJSON, true);

        $DataActual[] = $log;

        $DataActualizada = json_encode($DataActual);

        file_put_contents("./data/Log.json", $DataActualizada);
    }

    public function ReadLogFile()
    {
        $LogJSON = array();
        if (file_exists("./data/Log.json")) {
            $LogJSON = file_get_contents("./data/Log.json");
            $DataActual  = json_decode($LogJSON, true);
            return $DataActual;
        } else {
            return $LogJSON;
        }
    }

    public function ImportFile()
    {
        $tmp_name = $_FILES["file"]["tmp_name"];
        move_uploaded_file($tmp_name, "data/TransaccionJSONTemporal.json");

        if (file_exists("./data/TransaccionJSONTemporal.json")) {

            // Traemos el archivo que acabamos de subir
            $TransaccionJSONTemporal = file_get_contents("./data/TransaccionJSONTemporal.json");

            // Lo convertimos a array asosiativo
            $DataSubida  = json_decode($TransaccionJSONTemporal, true);

            // Traemos a nuestro archivo principal
            $TransaccionJSON = file_get_contents($this->directorio);

            // Lo convierte a un array asociativo
            $DataActual  = json_decode($TransaccionJSON, true);

            // Pasamos cada valor del array del arvhico que subimos dentro del array del
            // archivo principal
            foreach ($DataSubida as $key => $value) {
                $DataActual[] = $value;
            }

            // Lo pasamos a su formato anterior
            $DataActualizada = json_encode($DataActual);

            // Sobreescribimos nuestro arvhico principal
            file_put_contents($this->directorio, $DataActualizada);
        }
    }
}