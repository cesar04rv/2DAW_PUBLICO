<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
// Tamaño de la matriz
define("FILAS", 5);
define("COLUMNAS", 5);

// Función para crear y rellenar la matriz
function crearMatriz($filas, $columnas) {
    $matriz = [];
    for ($n = 0; $n < $filas; $n++) {
        for ($m = 0; $m < $columnas; $m++) {
            $matriz[$n][$m] = $n + $m; // regla M[n,m] = n + m
        }
    }
    return $matriz;
}

// Función para mostrar la matriz
function mostrarMatriz($matriz) {
    foreach ($matriz as $fila) {
        foreach ($fila as $valor) {
            printf("%4d", $valor); // ancho fijo para columnas alineadas
        }
        echo "\n";
    }
}

// Función para calcular la suma de cada fila
function sumaFilas($matriz) {
    $sumaFilas = [];
    foreach ($matriz as $i => $fila) {
        $sumaFilas[$i] = array_sum($fila);
    }
    return $sumaFilas;
}

// Función para calcular la suma de cada columna
function sumaColumnas($matriz) {
    $sumaColumnas = [];
    $filas = count($matriz);
    $columnas = count($matriz[0]);
    for ($m = 0; $m < $columnas; $m++) {
        $suma = 0;
        for ($n = 0; $n < $filas; $n++) {
            $suma += $matriz[$n][$m];
        }
        $sumaColumnas[$m] = $suma;
    }
    return $sumaColumnas;
}

// --- Programa principal ---

$M = crearMatriz(FILAS, COLUMNAS);

echo "Matriz 5x5:\n";
mostrarMatriz($M);

// Sumas
$sumasFilas = sumaFilas($M);
$sumasColumnas = sumaColumnas($M);

echo "\nSuma de filas:\n";
foreach ($sumasFilas as $i => $suma) {
    echo "Fila $i: $suma\n";
}

echo "\nSuma de columnas:\n";
foreach ($sumasColumnas as $m => $suma) {
    echo "Columna $m: $suma\n";
}
?>

</body>
</html>