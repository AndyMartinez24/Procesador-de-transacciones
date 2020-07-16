<?php
class CsvHelper
{
    public $directorio = "./data/TransaccionCSV.csv";

    function __construct()
    {
        if (!file_exists("./data")) {
            mkdir("./data", 0777, true);
        }
    }

    public function SaveInFile($transaccion)
    {

        $csv = array();
        $lines = file($this->directorio, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $key => $value) {
            $csv[$key] = str_getcsv($value);
        }

        $csv[] = array($transaccion->Id, $transaccion->Fecha, $transaccion->Monto, $transaccion->Descripcion);

        $fp = fopen($this->directorio, 'w');

        foreach ($csv as $campos) {
            fputcsv($fp, $campos);
        }

        fclose($fp);
    }

    public function ReadFile()
    {

        $TransaccionCSV = array();
        if (file_exists($this->directorio)) {
            $rows   = array_map('str_getcsv', file($this->directorio));
            $header = array("Id", "Fecha", "Monto", "Descripcion");
            $csv    = array();
            foreach ($rows as $row) {
                $csv[] = array_combine($header, $row);
            }
            return $csv;
        } else {
            return $TransaccionCSV;
        }
    }

    public function RecordInFile($id)
    {
        $csv = array();
        $lines = file($this->directorio, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $key => $value) {
            $csv[$key] = str_getcsv($value);
        }
        return $csv[$id];
    }

    public function EditInFile($id, $transaccion)
    {

        $csv = array();
        $lines = file($this->directorio, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $key => $value) {
            $csv[$key] = str_getcsv($value);
        }

        unset($csv[$id]);

        $csv[$id] = array($transaccion->Id, $transaccion->Fecha, $transaccion->Monto, $transaccion->Descripcion);

        $fp = fopen($this->directorio, 'w');

        foreach ($csv as $campos) {
            fputcsv($fp, $campos);
        }

        fclose($fp);
    }

    public function DeleteInFile($id)
    {
        $csv = array();
        $lines = file($this->directorio, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $key => $value) {
            $csv[$key] = str_getcsv($value);
        }

        unset($csv[$id]);

        $fp = fopen($this->directorio, 'w');

        foreach ($csv as $campos) {
            fputcsv($fp, $campos);
        }

        fclose($fp);
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
        move_uploaded_file($tmp_name, "data/TransaccionCSVTemporal.csv");

        if (file_exists("./data/TransaccionCSVTemporal.csv")) {

            $csv = array();
            $lines = file("./data/TransaccionCSVTemporal.csv", FILE_IGNORE_NEW_LINES);

            foreach ($lines as $key => $value) {
                $csv[$key] = str_getcsv($value);
            }

            $fp = fopen($this->directorio, 'w');

            foreach ($csv as $campos) {
                fputcsv($fp, $campos);
            }

            fclose($fp);
        }
    }
}