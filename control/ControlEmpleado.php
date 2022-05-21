<?php

include_once './ModelEmpleado.php';

$obj = new ModelEmpleado();
$obj->setNombreArchivo("../archivo/empleados.txt");

$accion = empty($_REQUEST["accion"]) ? "" : $_REQUEST["accion"];

if ($accion == "agregar") {
    $nombre = $_REQUEST["nombre"];
    $sueldo = $_REQUEST["sueldo"];
    $dni = $_REQUEST["dni"];

    $data = array(
        "dni" => $dni,
        "nombre" => $nombre,
        "sueldo" => $sueldo
    );

    $obj->GuardarArchivo($data);
} else if ($accion == "listar") {
    $data = $obj->CargarArchivo();
    echo json_encode($data);
} else if ($accion == "eliminar") {
    $indice = $_REQUEST["ind"];
    $data = $obj->CargarArchivo();
    unset($data[$indice]);
    $obj->ModificarArchivo($data);
}

header("location: ./../index.php");
?>