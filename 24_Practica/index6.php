#Buscar elemento en arreglo

<?php
$frutas = ["manzana", "pera","uva","mango"];

$buscar = "uva";

if (in_array($buscar , $frutas)){
    echo "La fruta existe";
} else {
    echo "La fruta no existe";
}
?>
# Menú de restaurante
<?php
$menu = readline("Ingrese el menu que desea (1=Hamburguesa , 2=Pizza , 3=Pollo broaster , 4=Ensalada )");

switch ($menu){
    case 1:
        echo "Eligio almorzar una Hamburguesa ";
        break;
    case 2:
        echo "Eligio almorzar una Pizza ";
        break;
    case 3:
        echo "Eligio almorzar una Pollo broaster ";
        break;
    case 4:
        echo "Eligio almorzar una Ensalada ";
        break;
    default:
        echo "Numero invalido";                       
}
