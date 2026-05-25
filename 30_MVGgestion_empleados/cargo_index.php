<?php
require_once "controllers/CargoController.php";
$controller = new CargoController($pdo);

//$accion = $_GET['accion'] ?? 'index';
$accion = $_GET['action'] ?? $_GET['accion'] ?? 'index';

$id = $_GET['id'] ?? null;

switch($accion){
    case 'crear': $controller->crear(); break;
    case 'guardar': $controller->guardar($_POST); break;
    case 'editar': $controller->editar($id); break;
    case 'actualizar': $controller->actualizar($id,$_POST); break;
    case 'eliminar': $controller->eliminar($id); break;
    default: $controller->index(); break;
}
