#Inventario de productos

<?php 
$productos = [
    ["P01","Mouse",50,3],
    ["P02","Teclado",80,2],
    ["P03","Monitor",700,1]
];

$totalI = 0;

foreach ($productos as $producto){
    $codigo = $producto[0];
    $nombre = $producto[1];
    $precio = $producto[2];
    $cantidad = $producto[3];

    $total = $precio * $cantidad;

    $totalI = $totalI + $total;

    echo "Codigo:  $codigo\n";
    echo "Nombre:  $nombre\n";
    echo "Precio:  $precio\n";
    echo "Cantidad:  $cantidad\n";
}
echo "Total inventario: ". $totalI;
?>

#Control de asistencia
<?php
for ($i =1; $i <=30; $i++){
    if($i != 15){
        echo "Falta registrar";
    } elseif ($i != 7){
        echo "Falta registar";
    } else {
        echo "Error";
    }
}
echo "Dias asistidos: " . $i;
