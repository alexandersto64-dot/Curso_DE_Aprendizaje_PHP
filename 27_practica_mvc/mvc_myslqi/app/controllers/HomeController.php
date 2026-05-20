<?php
require_once 'app/core/Database.php';

class HomeController
{
    public function index()
    {
        $db = new Database();
        $conn = $db->connect();

        $sql = "SELECT * FROM servicios";
        $result = $conn->query($sql);

        $servicios = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $servicios[] = $row;
            }
        }

        require_once 'app/view/home.php';
    }
}
