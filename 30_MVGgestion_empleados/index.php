<?php
require_once "controllers/EmpleadoController.php";
$controller = new EmpleadoController($pdo);

$accion = $_GET['accion'] ?? 'index';
$id = $_GET['id'] ?? null;

switch($accion){
    case 'crear': $controller->crear(); break;
    case 'guardar': $controller->guardar($_POST); break;
    case 'editar': $controller->editar($id); break;
    case 'actualizar': $controller->actualizar($id,$_POST); break;
    case 'eliminar': $controller->eliminar($id); break;
    default: $controller->index(); break;
}
