<?php
require_once __DIR__."/../config/db.php";
require_once __DIR__."/../models/Empleado.php";
require_once __DIR__."/../models/Cargo.php";

class EmpleadoController {
    private $empleado;
    private $cargo;
    public function __construct($pdo) {
        $this->empleado = new Empleado($pdo);
        $this->cargo = new Cargo($pdo);
    }

    public function index() {
        $empleados = $this->empleado->listar();
        $contenido = __DIR__."/../views/empleado/lista.php";
        include __DIR__."/../views/layout.php";
    }

    public function crear() {
        $cargos = $this->cargo->listar();
        $contenido = __DIR__."/../views/empleado/crear.php";
        include __DIR__."/../views/layout.php";
    }

    public function guardar($data) {
        $this->empleado->guardar($data);
        header("Location: index.php");
    }

    public function editar($id) {
        $empleado = $this->empleado->obtener($id);
        $cargos = $this->cargo->listar();
        $contenido = __DIR__."/../views/empleado/editar.php";
        include __DIR__."/../views/layout.php";
    }

    public function actualizar($id, $data) {
        $this->empleado->actualizar($id,$data);
        header("Location: index.php");
    }

    public function eliminar($id) {
        $this->empleado->eliminar($id);
        header("Location: index.php");
    }
}
