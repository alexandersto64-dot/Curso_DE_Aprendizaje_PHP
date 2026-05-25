<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($correo, $password) {
        $sql = "INSERT INTO usuario (correo, password) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$correo, password_hash($password, PASSWORD_DEFAULT)]);
    }

    public function login($correo, $password) {
        $sql = "SELECT * FROM usuario WHERE correo = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$correo]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
