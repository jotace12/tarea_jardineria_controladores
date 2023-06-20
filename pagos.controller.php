<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../models/pagos.model.php');
$pagos = new PagosModel; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET
    case 'todos':
        $datos = array();
        $datos = $pagos->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

        case 'uno':
            $codigo_cliente = $_POST('codigo_cliente');
            $id_transaccion = $_POST('id_transaccion');
            $datos = array();
            $datos = $pagos->uno($codigo_cliente,$id_transaccion);
            echo json_encode($datos);
            break;

    case 'insertar':
        $codigo_cliente = $_POST['codigo_cliente'];
        $forma_pago = $_POST['forma_pago'];
        $id_transaccion = $_POST['id_transaccion'];
        $fecha_pago = $_POST['fecha_pago'];
        $total = $_POST['total'];
        $datos = array();
        $datos = $pagos->insertar($codigo_cliente, $forma_pago, $id_transaccion, $fecha_pago, $total); 
        echo json_encode($datos);
        break;

        case 'eliminar':
            $id_transaccion = $_POST['id_transaccion'];
            $datos = array();
            $datos = $pagos->eliminar($id_transaccion);
            echo json_encode($datos);
            break;
}