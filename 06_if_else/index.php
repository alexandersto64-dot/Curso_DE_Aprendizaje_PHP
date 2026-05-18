<?php
$nota = $_POST['notas'];

if ($nota >=11){
    echo "Aprobado";
} else {
    echo "Desaprobado";
}

?>

<?php

// Obtener datos del formulario
$edad = $_POST["edad"] ?? "";
$nacionalidad = $_POST["nacionalidad"] ?? "";

// Evaluar mayoría de edad
if($edad >= 18){
    echo "Eres mayor de edad <br>";
}else{
    echo "Eres menor de edad <br>";
}
?>
<?php
// Evaluar nacionalidad
if($nacionalidad == "Peru"){
    echo "Eres peruano";
}else{
    echo "No eres peruano";
}
?>








