<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../models/empleados.model.php');
$Empleado = new EmpleadoModel; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET
    case 'todos':
        $datos = array();
        $datos = $Empleado->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

        case 'uno':
            $codigo_empleado = $_POST('codigo_empleado');
            $datos = array();
            $datos = $Empleado->uno($codigo_empleado);
            $respuesta = mysqli_fetch_assoc($datos);
            echo json_encode($respuesta);
            break;

    case 'insertar':
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido_contacto = $_POST['apellido2'];
        $extension = $_POST['extension'];
        $email = $_POST['email'];
        $codigo_oficina = $_POST['codigo_oficina'];
        $codigo_jefe = $_POST['codigo_jefe'];
        $puesto = $_POST['puesto'];
        $datos = array();
        $datos = $Empleado->Insertar($nombre, $apellido1, $apellido2, $extension,$email,$codigo_oficina,$codigo_jefe,$puesto); 
        echo json_encode($datos);
        break;

    case 'actualizar':
        $codigo_empleado = $_POST['codigo_empleado'];
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido_contacto = $_POST['apellido2'];
        $extension = $_POST['extension'];
        $email = $_POST['email'];
        $codigo_oficina = $_POST['codigo_oficina'];
        $codigo_jefe = $_POST['codigo_jefe'];
        $puesto = $_POST['puesto'];
        $datos = array();
        $datos = $Empleado->Actualizar($codigo_empleado,$nombre, $apellido1, $apellido2, $extension,$email,$codigo_oficina,$codigo_jefe,$puesto); 
        echo json_encode($datos);
        break;

        case 'eliminar':
            $codigo_empleado = $_POST['codigo_empleado'];
            $datos = array();
            $datos = $Empleado->Eliminar($codigo_empleado);
            echo json_encode($datos);
            break;
}