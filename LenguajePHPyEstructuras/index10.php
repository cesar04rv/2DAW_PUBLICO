<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

function leerEntrada($mensaje) {
    echo $mensaje;
    return trim(fgets(STDIN));
}

function obtenerNumeroDeOpciones() {
    $numOpciones = (int)leerEntrada("Introduce el número de opciones del menú: ");
    while (!filter_var($numOpciones, FILTER_VALIDATE_INT) || $numOpciones <= 0) {
        $numOpciones = (int)leerEntrada("Por favor, escribe un número entero válido mayor que 0: ");
    }
    return $numOpciones;
}

function obtenerOpcionesMenu($numOpciones) {
    $opciones = [];

    for ($i = 1; $i <= $numOpciones; $i++) {
        $identificador = leerEntrada("Introduce el identificador para la opción $i: ");
        $texto = leerEntrada("Introduce el texto para la opción $i: ");
        
        $tieneSubmenu = strtolower(leerEntrada("¿Esta opción tiene un submenú? (s/n): ")) === 's';

        if ($tieneSubmenu) {
            $numSubopciones = (int)leerEntrada("Introduce el número de opciones del submenú para '$texto': ");
            $subopciones = [];
            for ($j = 1; $j <= $numSubopciones; $j++) {
                $idSub = leerEntrada(" - Identificador de subopción $j: ");
                $textoSub = leerEntrada(" - Texto de subopción $j: ");
                $subopciones[$idSub] = $textoSub;
            }
            $opciones[$identificador] = [
                'texto' => $texto,
                'submenu' => $subopciones
            ];
        } else {
            $opciones[$identificador] = [
                'texto' => $texto,
                'submenu' => null
            ];
        }
    }

    return $opciones;
}

function obtenerCaracterDeTerminacion($opciones) {
    $terminar = leerEntrada("Introduce el carácter de terminación para salir del menú: ");
    while (array_key_exists($terminar, $opciones) || strlen($terminar) == 0) {
        $terminar = leerEntrada("Identificador no válido (ya existe o vacío). Intenta con otro: ");
    }
    return $terminar;
}

function mostrarSubmenu($submenu, $terminar, $opcionPadre) {
    while (true) {
        echo "\n--- SUBMENÚ DE '$opcionPadre' ---\n";
        foreach ($submenu as $id => $texto) {
            echo "$id. $texto\n";
        }
        echo "$terminar. Volver al menú principal\n";

        $eleccion = leerEntrada("Elige una opción del submenú: ");

        if ($eleccion === $terminar) {
            echo "Regresando al menú principal...\n";
            break;
        }

        if (array_key_exists($eleccion, $submenu)) {
            echo "Has elegido la opción '$submenu[$eleccion]' del submenú de '$opcionPadre'.\n";
        } else {
            echo "Subopción no válida.\n";
        }
    }
}

function mostrarMenu($opciones, $terminar) {
    while (true) {
        echo "\n--- MENÚ PRINCIPAL ---\n";
        foreach ($opciones as $id => $datos) {
            echo "$id. " . $datos['texto'] . "\n";
        }
        echo "$terminar. Salir\n";

        $eleccion = leerEntrada("Elige una opción: ");

        if ($eleccion === $terminar) {
            echo "Programa terminado.\n";
            break;
        }

        if (array_key_exists($eleccion, $opciones)) {
            $opcionSeleccionada = $opciones[$eleccion];
            if (is_array($opcionSeleccionada['submenu'])) {
                mostrarSubmenu($opcionSeleccionada['submenu'], $terminar, $opcionSeleccionada['texto']);
            } else {
                echo "Has elegido la opción: " . $opcionSeleccionada['texto'] . "\n";
            }
        } else {
            echo "Opción no válida.\n";
        }
    }
}

function ejecutarMenu() {
    $numOpciones = obtenerNumeroDeOpciones();
    $opciones = obtenerOpcionesMenu($numOpciones);
    $terminar = obtenerCaracterDeTerminacion($opciones);
    mostrarMenu($opciones, $terminar);
}

// Ejecutar
ejecutarMenu();
?>

</body>
</html>