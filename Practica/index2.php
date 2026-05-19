#Número mayor
<?php
$num1 = readline("Ingresa el primer numero: ");
$num2 = readline("Ingresa el segundo numero: ");
$num3 = readline("Ingresa el tercero numero: ");

if ($num1 >$num2 && $num1 > $num3){
    echo "Es el numero mayor: " . $num1;
} elseif ($num2 > $num1 && $num2 > $num3){
    echo "Es el numero mayor: " . $num2;
} elseif ($num3 > $num1 && $num3 > $num2){
    echo "Es el numero mayor: " . $num3;    
} else {
    echo "Los numeros son iguales";
}
?>
#Cajero automático
<?php
$saldo = 100;
$retiro = readline("Ingrese saldo a retirar: ");

if ($saldo <=$retiro){
    echo "Saldo insufiente" . "\n";
} elseif ($saldo >=$retiro){
    echo "Retiro exitoso" . "\n";
} else {
    echo "Error". "\n";
}
