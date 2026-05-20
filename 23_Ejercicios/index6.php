// Ejercicio 4: Promedio de notas

<?php
    $nota1 = readline("Ingresa la primera nota: ");
    $nota2 = readline("Ingresa la segunda nota: ");
    $nota3 = readline("Ingresa la tercera nota: ");
    
    $promedio = ($nota1 + $nota2 + $nota3)/ 3;

    echo "El promedio final es de: " . $promedio . "\n";
    if ($promedio >=13){
        echo "Felicidades has aprobado el curso";
    } else {
        echo "Reprobarás el curso, estudia más para la próxima";
    }
?>