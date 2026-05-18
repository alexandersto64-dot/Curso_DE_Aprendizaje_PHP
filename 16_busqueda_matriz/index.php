<?php

$personas = array (
    array ("nombre" => "Juan", "edad" => 25),
    array ("nombre" => "Maria" , "edad" => 30)
);

foreach ($personas as $per){
    if($per ["nombre"] == "Ana"){
        echo "Ejemplo 1: Persona encontrada: ". $per["nombre"] . "\n";
    }
}
?>
