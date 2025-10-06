<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencias</title>
</head>
<body>
    <?php

    function calcularPotencias($num, $exponente) {
        $resultados = array(); 
        $suma = 0;              

        // Bucle para calcular todas las potencias
        for ($i = 1; $i <= $exponente; $i++) {
            $potencia = pow($num, $i);   // pow(base, exponente)
            $resultados[] = $potencia;  // Guardamos en el array
            $suma += $potencia;         // Sumamos al total

            echo "La potencia número $i de $num es $potencia <br>";
        }

        echo "<br>La suma de todas las potencias es: $suma<br>";
        
        return $resultados; 
    }


    calcularPotencias(3, 5);

    ?>
</body>
</html>
