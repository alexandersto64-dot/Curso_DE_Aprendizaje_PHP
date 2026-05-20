# Promedio de alumno

<?php
$alumno = readline("Ingrese el nombre del alumno: ");
$nota1 = readline ("Ingrese la primera nota: ");
$nota2 = readline ("Ingrese la segunda nota: ");
$nota3 = readline ("Ingrese la tercera nota: ");
$nota4 = readline ("Ingrese la cuarta nota: ");

$promedio = ($nota1 + $nota2 + $nota3 + $nota4)/4;

echo "---Resultado---" . "\n";
echo "Nota1: " . $nota1 . "\n";
echo "Nota2: " . $nota2 . "\n";
echo "Nota3: " . $nota3 . "\n";
echo "Nota4: " . $nota4 . "\n";
echo "Promedio final: " .  $promedio . "\n";
if ($promedio >=11){
    echo "Esta aprobado";
} else {
    echo "Esta desaprobado";
}
?>
#Sistema de pensiones
<?php
    $nombre = "Juan";
    $carrera = "Ingenieria de Software";
    $pension = 500;
    $descuentoA = 0.15;
    $descuentoB = 0.05;

    if ($pension > 800 ){
        $descuento = $pension * $descuentoA; 
    } else {
        $descuento = $pension * $descuentoB;
    }
    $total = $pension - $descuento;

    echo "---Resultado---" . "\n";
    echo "El descuento es de: S/ " . $descuento ."\n";
    echo "El total final es de: S/ " . $total . "\n" 
?>