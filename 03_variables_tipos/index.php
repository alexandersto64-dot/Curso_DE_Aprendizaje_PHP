<?php 
$edad = 18;
$nombre = "Alexander";
$altura = 1.64;
$activo = true;

$color = array ("rojo","verde","azul");

class Persona {
    public $nombre;
    public $edad;
}
$persona = new Persona();
$persona ->nombre = "Soto" . "<br>";
$persona ->edad =18;
$nada = null;

// Mostrar los valores
echo "Edad:" . $edad . "<br>";
echo "Altura:" . $altura . "<br>";
echo "Nombre: ". $nombre . "<br>";
echo "Activo: ". ($activo ? "Si": "No") . "<br>";
echo "Color: ". implode (",", $color ). "<br>";
echo "Persona: ". $persona ->nombre . "Edad: " .  $persona ->edad . "<br>";
echo "Nada: " . ($nada === null ? "Nada" : $nada ) . "<br>";
?>