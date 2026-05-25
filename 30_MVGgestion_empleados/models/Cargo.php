<?php
class Cargo {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM cargo");
        return $stmt->fetchAll();
    }

    public function obtener($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM cargo WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function guardar($nombre) {
        $stmt = $this->pdo->prepare("INSERT INTO cargo (nombrecargo) VALUES (?)");
        return $stmt->execute([$nombre]);
    }

    public function actualizar($id, $nombre) {
        $stmt = $this->pdo->prepare("UPDATE cargo SET nombrecargo=? WHERE id=?");
        return $stmt->execute([$nombre,$id]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM cargo WHERE id=?");
        return $stmt->execute([$id]);
    }
}
