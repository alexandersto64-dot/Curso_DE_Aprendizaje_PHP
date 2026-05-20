#Suma de números pares

<?php
$suma = 0;

for ($i = 1; $i <=100; $i++){
    if ($i % 2 == 0){
        $suma += $i;
    }
}
echo "La suma de los numeros pares es de: " . $suma;
?>
#Registro de empleados
<?php
$empleados = array [
    ["Juan","Ana"]
]

