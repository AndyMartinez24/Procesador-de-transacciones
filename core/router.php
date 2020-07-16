<?php
include "core/models/TransaccionModel.php";
include "core/models/LogModel.php";
include "core/helper/JsonHelper.php";
include "core/helper/CsvHelper.php";
include "core/helper/TxtHelper.php";

// Aqui se incluyen los controladores que usaremos
include "core/controllers/TransaccionController.php";
//Aqui tomas las petisiones get
if (isset($_GET["controller"]) && isset($_GET["action"])) {

    //Aqui tomamos el nombre del controlador y lo usamos para crear una instancia de la clase de ese controlador
    $Controller = $_GET["controller"];
    $Controller = new $Controller;

    // Usamos la funcion de PHP call_user_func para llamar una funcion dentro de la clase
    // De ser necesario podemos pasar un array con valores que podria usar la funcion que esatmos usando
    call_user_func(array($Controller, $_GET["action"]));
} else {
    // Como no tenemos peticiones GET,por defecto le asignamos una vista informativa
    header("Location:index.php?controller=TransaccionController&action=Lista");
}