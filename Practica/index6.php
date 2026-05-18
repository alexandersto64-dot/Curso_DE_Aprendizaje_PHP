#Buscar elemento en arreglo

<?php
$frutas = ["manzana", "pera","uva","mango"];

$buscar = "uva";

if (in_array($buscar , $frutas)){
    echo "La fruta existe";
} else {
    echo "La fruta no existe";
}


