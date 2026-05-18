<?php
#Ejemplo 1

$frutas = array("manzana", "naranja", "platano");
echo "Ejemplo 1: Primera fruta: " . $frutas[0] . "\n";
echo "Ejemplo 2: Primera fruta: " . $frutas[1] . "\n";
?>

<?php
#Ejemplo 2
$letras = array("A", "B", "C", "D", "E");

foreach ($letras as $letra) {
    echo "Letra: " . $letra . "\n";
}
?>
<?php
$numeros = array(10, 25, 5, 30, 42, 75);

echo "Ejemplo 1: Primera numero: " . $numeros[0] . "\n";
echo "Ejemplo 2: Segundo numero: " . $numeros[1] . "\n";
echo "Ejemplo 3: Tercero numero: " . $numeros[2] . "\n";
echo "Ejemplo 4: Cuarto numero: " . $numeros[3] . "\n";

echo "Listado completo de numeros:";
foreach ($numeros as $num) {
    echo $num . "\n";
}
?>

