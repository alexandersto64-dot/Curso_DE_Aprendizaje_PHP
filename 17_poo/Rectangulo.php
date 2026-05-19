<?php
#Rectangulo
class Rectangulo
{
    public $ancho;
    public $alto;

    #Constructor
    public function __construct($ancho, $alto)
    {
        $this->ancho = $ancho;
        $this->alto = $alto;
    }
    #Metodo
    public function calcularArea()
    {
        return  $this->ancho * $this->alto;
    }
}

#Crear objeto
$miRectangulo = new Rectangulo(10, 5);
echo "El area es: " . $miRectangulo->calcularArea();
