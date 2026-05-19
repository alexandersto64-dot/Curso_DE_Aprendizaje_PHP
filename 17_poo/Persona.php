<?php
class Persona
{
    public $nombre;
    public $edad;
    public $telefono;
    public $direccion;

    #Constructor
    public function __construct($nombre, $edad, $telefono, $direccion)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
    }
    #Metodo
    public function saludar()
    {
        return "Hola, me llamo $this->nombre y tengo $this->edad mi telefono es $this->telefono y mi direccion es $this->direccion";
    }
}

#Crear objeto
$personal = new Persona("Juan", 30, 960751691, "Javier Heraud");
echo $personal->saludar();
