
#Ejemplo 3
<?php
$num1 = array (10,25.5,30,42.75);

echo "Primero numero: " . $num1[0]. PHP_EOL;
echo "Segundo numero: " . $num1[1]. PHP_EOL;
echo "Tercero numero: " . $num1[2]. PHP_EOL;
echo "Cuarto numero: " . $num1[3]. PHP_EOL;

$suma = array_sum($num1);

$cantidad = count($num1);

$promedio = $suma / $cantidad;

echo "Suma total: " . $suma . PHP_EOL;
echo "Cantidad de elementos: ". $cantidad . PHP_EOL;
echo "Promedio : ". number_format($promedio, 2). PHP_EOL;

echo "Listado de numeros: " . PHP_EOL;
foreach($num1 as $num){
    echo $num . PHP_EOL;
}


