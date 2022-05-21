<?php

class ModelEmpleado {

    private $NOMBRE_ARCHIVO = "./archivo/empleados.txt";
    private $SEPARADOR = "|";

    function setNombreArchivo($ruta) {
        $this->NOMBRE_ARCHIVO = $ruta;
    }

    function Mensaje() {
        return "mensaje: " . $this->NOMBRE_ARCHIVO;
    }

    function CargarArchivo() {
        $empleados = array();
        if (file_exists($this->NOMBRE_ARCHIVO)) {
            $archivo = fopen($this->NOMBRE_ARCHIVO, "r");

            while (!feof($archivo)) {
                $linea = fgets($archivo);
                if (!empty($linea)) {
                    $data = explode($this->SEPARADOR, $linea);

                    $empleados[] = array(
                        "dni" => $data[0],
                        "nombre" => $data[1],
                        "sueldo" => $data[2]
                    );
                }
            }
            fclose($archivo);
        }

        return $empleados;
    }

    function GuardarArchivo($data) {
        $archivo = fopen($this->NOMBRE_ARCHIVO, "a");
        $linea = $this->getLinea($data) . "\r\n";

        fwrite($archivo, $linea);
        fclose($archivo);
    }

    function ModificarArchivo($array) {
        if (unlink($this->NOMBRE_ARCHIVO)) {
            $archivo = fopen($this->NOMBRE_ARCHIVO, "a");
            foreach ($array as $key => $data) {
                $linea = $this->getLinea($data);
                fwrite($archivo, $linea);
            }
            fclose($archivo);
        }
    }

    function getLinea($data) {
        return $data["dni"] . $this->SEPARADOR . $data["nombre"] . $this->SEPARADOR . $data["sueldo"];
    }

}

?>
