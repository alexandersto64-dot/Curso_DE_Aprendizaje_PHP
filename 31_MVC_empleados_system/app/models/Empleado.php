<?php
class Empleado {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $sql = "SELECT e.*, c.nombrecargo FROM empleado e
                JOIN cargo c ON e.idcargo = c.idcargo";
        return $this->pdo->query($sql)->fetchAll();
    }

    public function getById($idempleado) {
        $sql = "SELECT * FROM empleado WHERE idempleado = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$idempleado]);
        return $stmt->fetch();
    }

    public function create($data) {
        $sql = "INSERT INTO empleado (dni, nombres, apellidos, direccion, telefono, observaciones, idcargo)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['dni'], $data['nombres'], $data['apellidos'],
            $data['direccion'], $data['telefono'], $data['observaciones'],
            $data['idcargo']
        ]);
    }

    public function update($idempleado, $data) {
        $sql = "UPDATE empleado SET dni=?, nombres=?, apellidos=?, direccion=?, telefono=?, observaciones=?, idcargo=?
                WHERE idempleado=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['dni'], $data['nombres'], $data['apellidos'],
            $data['direccion'], $data['telefono'], $data['observaciones'],
            $data['idcargo'], $idempleado
        ]);
    }

    public function delete($idempleado) {
        $sql = "DELETE FROM empleado WHERE idempleado = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$idempleado]);
    }
}
