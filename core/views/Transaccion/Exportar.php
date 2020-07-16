<?php
$fichero = "";
$extension = "";
if ($_GET["modo"] == "json") {
    $fichero = '../../../data/TransaccionJSON.json';
    $extension = ".json";
} elseif ($_GET["modo"] == "csv") {
    $fichero = '../../../data/TransaccionCSV.csv';
    $extension = ".csv";
}
header("Content-Disposition: attachment; filename=Transacciones" . $extension . " ");
header("Content-Type: application/octet-stream");
header("Content-Length: " . filesize($fichero));
readfile($fichero);