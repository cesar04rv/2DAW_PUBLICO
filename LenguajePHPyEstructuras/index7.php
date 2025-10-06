<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

echo "Introduce el número de opciones del menú: ";

$numOpciones = (int)trim(fgets(STDIN));

$pepa = true;
while ($pepa) {
    if (!filter_var($numOpciones, FILTER_VALIDATE_INT)) {
        echo "Por favor, escribe un número entero válido.\n";
        echo "Introduce el número de opciones del menú: ";
        $numOpciones = (int)trim(fgets(STDIN));
    } else {
        echo "Ha seleccionado $numOpciones opciones.\n";
        $pepa = false;
    }
}

$opciones = [];
$identificadores = [];

for ($i = 1; $i <= $numOpciones; $i++) {
    echo "Introduce el identificador para la opción $i: ";
    $identificador = trim(fgets(STDIN));
    $identificadores[$i] = $identificador;
    
    echo "Introduce el texto para la opción $i: ";
    $opciones[$identificador] = trim(fgets(STDIN)); 
}

echo "Introduce el carácter de terminación para salir del menú: ";
$terminar = trim(fgets(STDIN));

$pepe = true;
while ($pepe) {
    if ($terminar <= $numOpciones || in_array($terminar, $identificadores)) {
        echo "No puedes seleccionar ese identificador, selecciona otro.\n";
        echo "Introduce el carácter de terminación para salir del menú: ";
        $terminar = trim(fgets(STDIN));
    } else {
        $pepe = false;
    }
}

while (true) {
    echo "\n--- MENÚ ---\n";
    foreach ($opciones as $identificador => $texto) {
        echo "$identificador. $texto\n";
    }
    echo "$terminar. Salir\n";

    echo "Elige una opción: ";
    $eleccion = trim(fgets(STDIN));

    if ($eleccion === $terminar) {
        echo "Programa terminado.\n";
        break;
    }

    if (array_key_exists($eleccion, $opciones)) {
        echo "Has elegido la opción: " . $opciones[$eleccion] . "\n";
    } else {
        echo "Opción no válida.\n";
    }
}

?>


</body>
</html>
