<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../models/usuariosroles.models.php');
$usuariosroles = new UsuariosRolesModel; //TODO:Declaracion de variable
switch ($_GET['op']) {  //TODO: Clausula de desicion para obtener variable tipo GET
    case 'insertar':
        $idUsuario = $_POST['idUsuario'];
        $idRoles = $_POST['idRoles'];
        $datos = array();
        $datos = $usuariosroles->Insertar($idUsuario, $idRoles); 
        echo json_encode($datos);
        break;
}