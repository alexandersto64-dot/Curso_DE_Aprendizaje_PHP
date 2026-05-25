<?php
require_once __DIR__."/../config/db.php";
require_once __DIR__."/../models/Cargo.php";

class CargoController {
    private $cargo;
    public function __construct($pdo) {
        $this->cargo = new Cargo($pdo);
    }

    public function index() {
        $cargos = $this->cargo->listar();
        $contenido = __DIR__."/../views/cargo/lista.php";
        include __DIR__."/../views/layout.php";
    }

    public function crear() {
        $contenido = __DIR__."/../views/cargo/crear.php";
        include __DIR__."/../views/layout.php";
    }

    public function guardar($data) {
        $this->cargo->guardar($data['nombrecargo']);
        header("Location: cargo_index.php");
    }

    public function editar($id) {
        $cargo = $this->cargo->obtener($id);
        $contenido = __DIR__."/../views/cargo/editar.php";
        include __DIR__."/../views/layout.php";
    }

    public function actualizar($id, $data) {
        $this->cargo->actualizar($id, $data['nombrecargo']);
        header("Location: cargo_index.php");
    }

    public function eliminar($id) {
        $this->cargo->eliminar($id);
        header("Location: cargo_index.php");
    }
}
