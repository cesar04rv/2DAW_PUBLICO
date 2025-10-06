<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Interactivo</title>
</head>
<body>
    
<?php

function obtenerNumeroDeOpciones(){
    echo "Introduce el número de opciones del menú: ";
    $numOpciones = (int)trim(fgets(STDIN));

    while (!filter_var($numOpciones, FILTER_VALIDATE_INT) || $numOpciones <= 0) {
        echo "Por favor, escribe un número entero válido mayor que 0.\n";
        echo "Introduce el número de opciones del menú: ";
        $numOpciones = (int)trim(fgets(STDIN));
    }

    echo "Has seleccionado $numOpciones opciones.\n";
    return $numOpciones;
}

function obtenerOpcionesMenu($numOpciones){
    $opciones = [];

    for ($i = 1; $i <= $numOpciones; $i++) {
        echo "Introduce el identificador para la opción $i: ";
        $identificador = trim(fgets(STDIN));
        
        echo "Introduce el texto para la opción $i: ";
        $opciones[$identificador] = trim(fgets(STDIN)); 
    }

    return $opciones;
}

function obtenerCaracterDeTerminacion($opciones, $numOpciones){
    echo "Introduce el carácter de terminación para salir del menú: ";
    $terminar = trim(fgets(STDIN));

    while (in_array($terminar, array_keys($opciones)) || strlen($terminar) == 0) {
        echo "No puedes seleccionar un identificador ya usado o vacío. Elige otro.\n";
        echo "Introduce el carácter de terminación para salir del menú: ";
        $terminar = trim(fgets(STDIN));
    }

    return $terminar;
}

function mostrarMenu($opciones, $terminar){
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
}

function ejecutarMenu(){
    $numOpciones = obtenerNumeroDeOpciones();

    $opciones = obtenerOpcionesMenu($numOpciones);

    $terminar = obtenerCaracterDeTerminacion($opciones, $numOpciones);

    mostrarMenu($opciones, $terminar);
}

ejecutarMenu();

?>

</body>
</html>
