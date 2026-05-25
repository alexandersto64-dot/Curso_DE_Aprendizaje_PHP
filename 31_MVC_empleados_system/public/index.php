<?php
session_start();
require_once '../config/database.php';

// Autoload controllers
spl_autoload_register(function($class){
    $paths = ['../app/controllers/', '../app/models/'];
    foreach($paths as $path){
        $file = $path . $class . '.php';
        if(file_exists($file)){
            require_once $file;
            return;
        }
    }
});

// Obtener controlador y acción desde query params
$controller = $_GET['controller'] ?? 'user';
$action = $_GET['action'] ?? 'login';

// Formatear nombres de clases y métodos
$controllerName = ucfirst($controller) . 'Controller';

if(class_exists($controllerName)){
    $controllerObject = new $controllerName();
    if(method_exists($controllerObject, $action)){
        $controllerObject->$action();
    } else {
        echo "Acción no encontrada.";
    }
} else {
    echo "Controlador no encontrado.";
}
