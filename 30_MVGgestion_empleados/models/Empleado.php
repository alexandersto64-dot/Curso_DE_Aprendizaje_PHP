<?php
class Empleado {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function listar() {
        $stmt = $this->pdo->query("SELECT e.*, c.nombrecargo 
                                   FROM empleado e 
                                   LEFT JOIN cargo c ON e.cargo_id = c.id");
        return $stmt->fetchAll();
    }

    public function obtener($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM empleado WHERE idempleado = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function guardar($data) {
        $stmt = $this->pdo->prepare("INSERT INTO empleado (dni, nombres, apellidos, direccion, telefono, cargo_id) 
                                     VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$data['dni'],$data['nombres'],$data['apellidos'],$data['direccion'],$data['telefono'],$data['cargo_id']]);
    }

    public function actualizar($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE empleado SET dni=?, nombres=?, apellidos=?, direccion=?, telefono=?, cargo_id=? WHERE idempleado=?");
        return $stmt->execute([$data['dni'],$data['nombres'],$data['apellidos'],$data['direccion'],$data['telefono'],$data['cargo_id'],$id]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM empleado WHERE idempleado=?");
        return $stmt->execute([$id]);
    }
}
