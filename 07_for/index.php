#Ejemplo 1
<?php
for ($i = 1; $i <= 5; $i++) {
    echo "Ejemplo 1: Iteracion \n";
}
?>

#Ejemplo 2
<?php
for ($i = 1; $i <= 10; $i++) {
    echo "Numero: " . $i . "\n";
}

?>
#Ejemplo 3
<?php
$frutas = array("Manzana", "Banana", "Cereza", "Uva");
for ($i = 0; $i < count($frutas); $i++) {
    echo "Fruta: " . ($i + 1) . ": " . $frutas[$i] . "\n";
}
?>

#Ejemplo 4
<?php
$semana = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
for ($i = 0; $i < count($semana); $i++) {
    echo "Fruta: " . ($i + 1) . ": " . $semana[$i] . "\n";
}
?>