<?php
class EmpleadoController {
    private $conn;

    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?controller=user&action=login");
            exit;
        }
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function index() {
        $stmt = $this->conn->prepare("SELECT e.*, c.nombrecargo FROM empleado e LEFT JOIN cargo c ON e.idcargo = c.idcargo ORDER BY e.idempleado DESC");
        $stmt->execute();
        $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../app/views/empleado/index.php';
    }

    public function create() {
        $stmt = $this->conn->prepare("SELECT * FROM cargo ORDER BY nombrecargo");
        $stmt->execute();
        $cargos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dni = trim($_POST['dni'] ?? '');
            $nombres = trim($_POST['nombres'] ?? '');
            $apellidos = trim($_POST['apellidos'] ?? '');
            $direccion = trim($_POST['direccion'] ?? '');
            $telefono = trim($_POST['telefono'] ?? '');
            $observaciones = trim($_POST['observaciones'] ?? '');
            $idcargo = $_POST['idcargo'] ?? null;

            // Validaciones
            if (empty($dni) || !preg_match('/^\d{8}$/', $dni)) {
                $errores[] = "El DNI debe tener exactamente 8 dígitos.";
            }

            if (empty($nombres) || !preg_match('/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/', $nombres)) {
                $errores[] = "Nombres solo debe contener letras y espacios.";
            }

            if (empty($apellidos) || !preg_match('/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/', $apellidos)) {
                $errores[] = "Apellidos solo debe contener letras y espacios.";
            }

            if (!empty($telefono) && !preg_match('/^\d{7,15}$/', $telefono)) {
                $errores[] = "El teléfono debe contener entre 7 y 15 dígitos.";
            }

            if (empty($idcargo) || !is_numeric($idcargo)) {
                $errores[] = "Seleccione un cargo válido.";
            }

            if (empty($errores)) {
                $stmt = $this->conn->prepare("INSERT INTO empleado(dni, nombres, apellidos, direccion, telefono, observaciones, idcargo) VALUES (:dni, :nombres, :apellidos, :direccion, :telefono, :observaciones, :idcargo)");
                $stmt->bindParam(':dni', $dni);
                $stmt->bindParam(':nombres', $nombres);
                $stmt->bindParam(':apellidos', $apellidos);
                $stmt->bindParam(':direccion', $direccion);
                $stmt->bindParam(':telefono', $telefono);
                $stmt->bindParam(':observaciones', $observaciones);
                $stmt->bindParam(':idcargo', $idcargo);
                $stmt->execute();
                header("Location: ?controller=empleado&action=index");
                exit;
            }

            // Si hay errores, conservar datos ingresados
            $empleado = compact('dni', 'nombres', 'apellidos', 'direccion', 'telefono', 'observaciones', 'idcargo');
        }

        include '../app/views/empleado/form.php';
    }

    public function edit() {
        $idempleado = $_GET['idempleado'] ?? null;
        if (!$idempleado) {
            header("Location: ?controller=empleado&action=index");
            exit;
        }

        $stmt = $this->conn->prepare("SELECT * FROM empleado WHERE idempleado = :idempleado");
        $stmt->bindParam(':idempleado', $idempleado);
        $stmt->execute();
        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->conn->prepare("SELECT * FROM cargo ORDER BY nombrecargo");
        $stmt->execute();
        $cargos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dni = trim($_POST['dni'] ?? '');
            $nombres = trim($_POST['nombres'] ?? '');
            $apellidos = trim($_POST['apellidos'] ?? '');
            $direccion = trim($_POST['direccion'] ?? '');
            $telefono = trim($_POST['telefono'] ?? '');
            $observaciones = trim($_POST['observaciones'] ?? '');
            $idcargo = $_POST['idcargo'] ?? null;

            // Validaciones
            if (empty($dni) || !preg_match('/^\d{8}$/', $dni)) {
                $errores[] = "El DNI debe tener exactamente 8 dígitos.";
            }

            if (empty($nombres) || !preg_match('/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/', $nombres)) {
                $errores[] = "Nombres solo debe contener letras y espacios.";
            }

            if (empty($apellidos) || !preg_match('/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/', $apellidos)) {
                $errores[] = "Apellidos solo debe contener letras y espacios.";
            }

            if (!empty($telefono) && !preg_match('/^\d{7,15}$/', $telefono)) {
                $errores[] = "El teléfono debe contener entre 7 y 15 dígitos.";
            }

            if (empty($idcargo) || !is_numeric($idcargo)) {
                $errores[] = "Seleccione un cargo válido.";
            }

            if (empty($errores)) {
                $stmt = $this->conn->prepare("UPDATE empleado SET dni = :dni, nombres = :nombres, apellidos = :apellidos, direccion = :direccion, telefono = :telefono, observaciones = :observaciones, idcargo = :idcargo WHERE idempleado = :idempleado");
                $stmt->bindParam(':dni', $dni);
                $stmt->bindParam(':nombres', $nombres);
                $stmt->bindParam(':apellidos', $apellidos);
                $stmt->bindParam(':direccion', $direccion);
                $stmt->bindParam(':telefono', $telefono);
                $stmt->bindParam(':observaciones', $observaciones);
                $stmt->bindParam(':idcargo', $idcargo);
                $stmt->bindParam(':idempleado', $idempleado);
                $stmt->execute();
                header("Location: ?controller=empleado&action=index");
                exit;
            }

            // Reemplazar valores del empleado para mantener en el formulario
            $empleado = compact('dni', 'nombres', 'apellidos', 'direccion', 'telefono', 'observaciones', 'idcargo');
        }

        include '../app/views/empleado/form.php';
    }

    public function delete() {
        $idempleado = $_GET['idempleado'] ?? null;
        if ($idempleado) {
            $stmt = $this->conn->prepare("DELETE FROM empleado WHERE idempleado = :idempleado");
            $stmt->bindParam(':idempleado', $idempleado);
            $stmt->execute();
        }
        header("Location: ?controller=empleado&action=index");
    }
}
