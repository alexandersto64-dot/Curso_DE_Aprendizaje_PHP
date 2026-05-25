<?php
class Cargo {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $sql = "SELECT * FROM cargo";
        return $this->pdo->query($sql)->fetchAll();
    }

    public function getById($idcargo) {
        $sql = "SELECT * FROM cargo WHERE idcargo = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$idcargo]);
        return $stmt->fetch();
    }

    public function create($nombrecargo) {
        $sql = "INSERT INTO cargo (nombrecargo) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombrecargo]);
    }

    public function update($idcargo, $nombrecargo) {
        $sql = "UPDATE cargo SET nombrecargo = ? WHERE idcargo = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombrecargo, $idcargo]);
    }

    public function delete($idcargo) {
        $sql = "DELETE FROM cargo WHERE idcargo = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$idcargo]);
    }
}
