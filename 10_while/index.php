# Ejemplo 1

<?php
$i = 1;
while ($i <= 5) {
    echo "Ejemplo 1: Hola mundo $i\n";
    $i++;
}
# Ejemplo 2 
while ($i <= 100) {
    echo "Numero: " . $i . "\n";
    $i++;
}
?>
<?php
# Ejemplo 3
$i = 1;
$suma = 0;

while ($i <= 10) {
    $suma += $i;
    $i++;
}
echo "Ls suma de los numero del 1 al 10 es: " . $suma;
?>