<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../models/cliente.model.php');
$Cliente = new cliente; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET
    case 'todos':
        $datos = array();
        $datos = $Cliente->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

        case 'uno':
            $codigo_cliente = $_POST('codigo_cliente');
            $datos = array();
            $datos = $Cliente->uno($codigo_cliente);
            $respuesta = mysqli_fetch_assoc($datos);
            echo json_encode($respuesta);
            break;

    case 'insertar':
        $nombre_cliente = $_POST['nombre_cliente'];
        $nombre_contacto = $_POST['nombre_contacto'];
        $apellido_contacto = $_POST['apellido_contacto'];
        $telefono = $_POST['telefono'];
        $fax = $_POST['fax'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $ciudad = $_POST['ciudad'];
        $region = $_POST['region'];
        $pais = $_POST['pais'];
        $codigo_postal = $_POST['codigo_postal'];
        $codigo_empleado_rep_ventas = $_POST['codigo_empleado_rep_ventas'];
        $limite_credito = $_POST['limite_credito'];
        $datos = array();
        $datos = $Cliente->Insertar($nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono,$fax,$linea_direccion1,$linea_direccion2,$ciudad,$region,$pais,$codigo_postal,$codigo_empleado_rep_ventas,$limite_credito); 
        echo json_encode($datos);
        break;

    case 'actualizar':
        $codigo_cliente = $_POST['codigo_cliente'];
        $nombre_cliente = $_POST['nombre_cliente'];
        $nombre_contacto = $_POST['nombre_contacto'];
        $apellido_contacto = $_POST['apellido_contacto'];
        $telefono = $_POST['telefono'];
        $fax = $_POST['fax'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $ciudad = $_POST['ciudad'];
        $region = $_POST['region'];
        $pais = $_POST['pais'];
        $codigo_postal = $_POST['codigo_postal'];
        $codigo_empleado_rep_ventas = $_POST['codigo_empleado_rep_ventas'];
        $limite_credito = $_POST['limite_credito'];
        $datos = array();
        $datos = $Cliente->Actualizar($codigo_cliente,$nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono,$fax,$linea_direccion1,$linea_direccion2,$ciudad,$region,$pais,$codigo_postal,$codigo_empleado_rep_ventas,$limite_credito); 
        echo json_encode($datos);
        break;

        case 'eliminar':
            $codigo_cliente = $_POST['codigo_cliente'];
            $datos = array();
            $datos = $Cliente->Eliminar($codigo_cliente);
            echo json_encode($datos);
            break;
}