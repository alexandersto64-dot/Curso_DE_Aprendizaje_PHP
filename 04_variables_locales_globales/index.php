<?php 
function saludar(){
    $mensaje = "Hola, soy una variable local.";
    echo $mensaje;
}
saludar ();
echo $mensaje; // Esto generará un error, ya que $mensaje es una variable local a la función saludar() y no está disponible fuera de ella.
?>

<?php
    $saludo = "Hola, soy una variable global.";
    function mostrarSaludo(){
        global $saludo;
        echo $saludo;
    }
    mostrarSaludo(); // Esto imprimirá "Hola, soy una variable global."
?>

