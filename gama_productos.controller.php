<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../models/gama_productos.model.php');
$gama_productos = new gama_productosModel; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET
    case 'todos':
        $datos = array();
        $datos = $gama_productos->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

        case 'uno':
            $gama = $_POST('gama');
            $datos = array();
            $datos = $gama_productos->uno($gama);
            $respuesta = mysqli_fetch_assoc($datos);
            echo json_encode($respuesta);
            break;

    case 'insertar':
        $gama = $_POST['gama'];
        $descripcion_texto = $_POST['descripcion_texto'];
        $descripcion_html = $_POST['descripcion_html'];
        $imagen = $_POST['imagen'];
        $datos = array();
        $datos = $detalle_pedido->Insertar($gama, $descripcion_texto, $descripcion_html, $imagen); 
        echo json_encode($datos);
        break;

    case 'actualizar':
        $gama = $_POST['gama'];
        $descripcion_texto = $_POST['descripcion_texto'];
        $descripcion_html = $_POST['descripcion_html'];
        $imagen = $_POST['imagen'];
        $datos = array();
        $datos = $detalle_pedido->Actualizar($gama, $descripcion_texto, $descripcion_html, $imagen); 
        echo json_encode($datos);
        break;

        case 'eliminar':
            $gama = $_POST['gama'];
            $datos = array();
            $datos = $gama_productos->Eliminar($gama);
            echo json_encode($datos);
            break;
}