<?php
$i = 1;
do {
    echo "Ejemplo 1: Hola mundo $i\n";
    $i++;
} while ($i <= 5);
?> 

<?php
$mensaje = "Hola, esta es una repeticion: ";
$repeticiones = 1;

do {
    echo $mensaje . $repeticiones . "\n";
    $repeticiones++;
} while ($repeticiones <= 5);
?>