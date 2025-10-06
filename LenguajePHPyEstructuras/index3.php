<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Salarios</title>
</head>
<body>
<?php


function salarioMaximo($trabajadores) {
    return max($trabajadores);
}

function salarioMinimo($trabajadores) {
    return min($trabajadores);
}

function salarioMedio($trabajadores) {
    return array_sum($trabajadores) / count($trabajadores);
}

function mostrarSalarios($trabajadores) {
    foreach ($trabajadores as $nombre => $salario) {
        echo "$nombre → $salario €<br>";
    }
}

$trabajadores = array();
$trabajadores["Ana"] = 1200;
$trabajadores["Luis"] = 1500;
$trabajadores["María"] = 1800;
$trabajadores["Pedro"] = 1000;

echo "<h2>Salarios iniciales</h2>";
mostrarSalarios($trabajadores);

echo "<br>Salario máximo: " . salarioMaximo($trabajadores) . " €";
echo "<br>Salario mínimo: " . salarioMinimo($trabajadores) . " €";
echo "<br>Salario medio: " . round(salarioMedio($trabajadores), 2) . " €<br><br>";

$incremento = 25; 
echo "<h2>Aplicando un incremento del $incremento%</h2>";

foreach ($trabajadores as $nombre => $salario) {
    $trabajadores[$nombre] = $salario + ($salario * $incremento / 100);
}

echo "<h2>Nuevos salarios</h2>";
mostrarSalarios($trabajadores);

echo "<br>Nuevo salario máximo: " . salarioMaximo($trabajadores) . " €";
echo "<br>Nuevo salario mínimo: " . salarioMinimo($trabajadores) . " €";
echo "<br>Nuevo salario medio: " . round(salarioMedio($trabajadores), 2) . " €";

?>
</body>
</html>
