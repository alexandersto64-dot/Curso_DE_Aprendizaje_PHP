<?php
session_start();
require_once '../config/database.php';

// ── Base URL dinámica (funciona en cualquier subcarpeta) ──────────────────────
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host     = $_SERVER['HTTP_HOST'];
$script   = dirname($_SERVER['SCRIPT_NAME']); // ej: /miProyectoMVC/public
define('BASE_URL', $protocol . '://' . $host . rtrim($script, '/'));

// Autoload controllers y models
spl_autoload_register(function ($class) {
    $paths = ['../app/controllers/', '../app/models/'];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Router
$controller = $_GET['controller'] ?? 'user';
$action     = $_GET['action']     ?? 'login';

$controllerName = ucfirst($controller) . 'Controller';

if (class_exists($controllerName)) {
    $obj = new $controllerName();
    if (method_exists($obj, $action)) {
        $obj->$action();
    } else {
        echo "Acción no encontrada.";
    }
} else {
    echo "Controlador no encontrado.";
}
