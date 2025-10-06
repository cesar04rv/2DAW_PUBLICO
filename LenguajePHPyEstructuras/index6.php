<?php
// Generar una matriz aleatoria de tamaño $filas x $columnas
function generarMatriz($filas, $columnas) {
    $matriz = [];
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            $matriz[$i][$j] = rand(1, 9); // números positivos > 0
        }
    }
    return $matriz;
}

// Mostrar una matriz en formato tabla
function mostrarMatriz($matriz) {
    foreach ($matriz as $fila) {
        foreach ($fila as $valor) {
            printf("%4d", $valor);
        }
        echo "\n";
    }
}

// Función principal para operar matrices
function operaMatriz($A, $B, $op) {
    $filas = count($A);
    $columnas = count($A[0]);
    $resultado = [];

    // Operar elemento a elemento
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            switch ($op) {
                case 's': // Suma
                    $resultado[$i][$j] = $A[$i][$j] + $B[$i][$j];
                    break;
                case 'r': // Resta
                    $resultado[$i][$j] = $A[$i][$j] - $B[$i][$j];
                    break;
                case 'm': // Multiplicación
                    $resultado[$i][$j] = $A[$i][$j] * $B[$i][$j];
                    break;
                case 'd': // División
                    $resultado[$i][$j] = $B[$i][$j] != 0 
                        ? round($A[$i][$j] / $B[$i][$j], 2) 
                        : 0;
                    break;
                default:
                    echo "Operación no válida\n";
                    return;
            }
        }
    }

    // Mostrar resultados
    echo "Matriz A:\n";
    mostrarMatriz($A);
    echo "\nMatriz B:\n";
    mostrarMatriz($B);

    $operaciones = ['s' => 'Suma', 'r' => 'Resta', 'm' => 'Multiplicación', 'd' => 'División'];
    echo "\nOperación realizada: " . $operaciones[$op] . "\n";
    echo "Matriz resultado:\n";
    mostrarMatriz($resultado);
}

// --- PROGRAMA PRINCIPAL ---
// Definir tamaño de las matrices
$filas = 3;
$columnas = 3;

// Generar matrices aleatorias
$A = generarMatriz($filas, $columnas);
$B = generarMatriz($filas, $columnas);

// Llamada a la función con operación (s = suma, r = resta, m = multiplicar, d = dividir)
operaMatriz($A, $B, 's'); // cambia 's' por 'r', 'm' o 'd'
?>
