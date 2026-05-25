<?php
class CargoController {
    private $conn;

    public function __construct(){
        if(!isset($_SESSION['user_id'])){
            header("Location: ?controller=user&action=login");
            exit;
        }
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM cargo ORDER BY idcargo asc");
        $stmt->execute();
        $cargos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '../app/views/cargo/index.php';
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nombrecargo = $_POST['nombrecargo'] ?? '';

            if($nombrecargo){
                $stmt = $this->conn->prepare("INSERT INTO cargo(nombrecargo) VALUES (:nombrecargo)");
                $stmt->bindParam(':nombrecargo', $nombrecargo);
                $stmt->execute();
                header("Location: ?controller=cargo&action=index");
                exit;
            }
        }

        include '../app/views/cargo/form.php';
    }

    public function edit(){
        $idcargo = $_GET['idcargo'] ?? null;
        if(!$idcargo){
            header("Location: ?controller=cargo&action=index");
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nombrecargo = $_POST['nombrecargo'] ?? '';
            if($nombrecargo){
                $stmt = $this->conn->prepare("UPDATE cargo SET nombrecargo = :nombrecargo WHERE idcargo = :idcargo");
                $stmt->bindParam(':nombrecargo', $nombrecargo);
                $stmt->bindParam(':idcargo', $idcargo);
                $stmt->execute();
                header("Location: ?controller=cargo&action=index");
                exit;
            }
        }

        $stmt = $this->conn->prepare("SELECT * FROM cargo WHERE idcargo = :idcargo");
        $stmt->bindParam(':idcargo', $idcargo);
        $stmt->execute();
        $cargo = $stmt->fetch(PDO::FETCH_ASSOC);

        include '../app/views/cargo/form.php';
    }

    public function delete(){
        $idcargo = $_GET['idcargo'] ?? null;
        if($idcargo){
            $stmt = $this->conn->prepare("DELETE FROM cargo WHERE idcargo = :idcargo");
            $stmt->bindParam(':idcargo', $idcargo);
            $stmt->execute();
        }
        header("Location: ?controller=cargo&action=index");
    }
}
