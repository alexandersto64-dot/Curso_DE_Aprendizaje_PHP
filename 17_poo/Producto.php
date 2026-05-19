<?php
class Producto
{
    public $nombre;
    public $precio;


    #Constructor
    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
    #Metodo
    public function mostrar()
    {
        return "$this->nombre cuesta $$this->precio";
    }
}
#Crear objeto
$lista = [
    new Producto("Laptop", 1500),
    new Producto("Mouse", 20),
    new Producto("Teclado", 45),
];
foreach ($lista as $producto) {
    echo $producto->mostrar() . "\n";
}
