#Tabla de multiplicar

<?php

$numero = readline("Ingrese un numero: ");
for ($i = 1; $i <=12; $i++){
    echo $numero . " x " . $i . " = " . ($numero * $i) . "\n";
}
?>

<?php
$num1 = readline("Ingrese un numero: ");

for ($i = 1; $i <=5; $i++){
    echo $num1 . " x " . $i . " = " . ($num1 * $i). "\n";
}
?>
#Suma de múltiplos de 3
<?php
$suma =0;

for ($i = 1; $i<= 100; $i++){
    if($i % 3 ==0){
    $suma +=$i;
    }
} 
echo "La suma de todos los multiplos 3 es de: " . $suma;