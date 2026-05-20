#Validar contraseña

<?php 
$clavecorrecta = 1234;
$clave = "";

do {
    $clave = readline("Ingrese la contraseña: ");

}  while ($clave != $clavecorrecta);
echo "Contraseña correcta";
?>
# Inventario simple
<?php
$productos = [
    ["P01","Mouse",50,3],
    ["P02","Teclado",80,2],
    ["P03","Monitor",700,1]
];
foreach ($productos as $producto){
    $codigo = $producto[0];
    $nombre = $producto[1];
    $precio = $producto[2];
    $cantidad = $producto[3];

    if ($cantidad <5){
        echo "Los productos con menor a 5 son: " . $cantidad;
    }
}
