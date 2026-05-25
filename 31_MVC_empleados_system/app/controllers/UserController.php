<?php
class UserController {
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $correo = $_POST['correo'] ?? '';
            $password = $_POST['password'] ?? '';

            $query = "SELECT * FROM usuario WHERE correo = :correo LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($password, $user['password'])){
                $_SESSION['user_id'] = $user['iduser'];
                $_SESSION['user_correo'] = $user['correo'];
                header("Location: ?controller=empleado&action=index");
                exit;
            } else {
                $error = "Correo o contraseña incorrectos.";
            }
        }

        include '../app/views/user/login.php';
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $correo = $_POST['correo'] ?? '';
            $password = $_POST['password'] ?? '';
            $password_confirm = $_POST['password_confirm'] ?? '';

            $error = null;

            if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                $error = "Correo inválido.";
            } elseif($password !== $password_confirm){
                $error = "Las contraseñas no coinciden.";
            } else {
                // Verificar si existe
                $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE correo = :correo");
                $stmt->bindParam(':correo', $correo);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $error = "El correo ya está registrado.";
                } else {
                    $passHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $this->conn->prepare("INSERT INTO usuario(correo, password) VALUES (:correo, :password)");
                    $stmt->bindParam(':correo', $correo);
                    $stmt->bindParam(':password', $passHash);
                    if($stmt->execute()){
                        header("Location: ?controller=user&action=login");
                        exit;
                    } else {
                        $error = "Error al registrar usuario.";
                    }
                }
            }
        }

        include '../app/views/user/register.php';
    }

    public function logout(){
        session_destroy();
        header("Location: ?controller=user&action=login");
        exit;
    }
}
