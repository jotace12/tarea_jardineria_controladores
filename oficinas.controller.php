<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../models/oficinas.model.php');
$oficinas = new OficinasModel; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET
    case 'todos':
        $datos = array();
        $datos = $oficinas->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

        case 'uno':
            $oficinas = $_POST('codigo_oficina');
            $datos = array();
            $datos = $oficinas->uno($codigo_oficina);
            $respuesta = mysqli_fetch_assoc($datos);
            echo json_encode($respuesta);
            break;

    case 'insertar':
        $codigo_oficina = $_POST['codigo_oficina'];
        $ciudad = $_POST['ciudad'];
        $pais = $_POST['pais'];
        $region = $_POST['region'];
        $codigo_postal = $_POST['codigo_postal'];
        $telefono = $_POST['telefono'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $datos = array();
        $datos = $oficinas->insertar($codigo_oficina, $ciudad, $pais, $region,$codigo_postal,$telefono,$linea_direccion1,$linea_direccion2); 
        echo json_encode($datos);
        break;

    case 'actualizar':
        $codigo_oficina = $_POST['codigo_oficina'];
        $ciudad = $_POST['ciudad'];
        $pais = $_POST['pais'];
        $region = $_POST['region'];
        $codigo_postal = $_POST['codigo_postal'];
        $telefono = $_POST['telefono'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $datos = array();
        $datos = $oficinas->actualizar($codigo_oficina, $ciudad, $pais, $region,$codigo_postal,$telefono,$linea_direccion1,$linea_direccion2); 
        echo json_encode($datos);
        break;

        case 'eliminar':
            $codigo_oficina = $_POST['codigo_oficina'];
            $datos = array();
            $datos = $oficinas->eliminar($codigo_oficina);
            echo json_encode($datos);
            break;
}