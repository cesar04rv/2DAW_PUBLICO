<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

// Array principal que guarda los libros
$biblioteca = [];

// Función para leer del teclado
function leer($mensaje) {
    echo $mensaje;
    return trim(fgets(STDIN));
}

// Añadir un libro nuevo
function anadirLibro(&$biblioteca) {
    $titulo = leer("Título del libro: ");

    if (isset($biblioteca[$titulo])) {
        echo "Ese libro ya existe.\n";
        return;
    }

    $autor = leer("Autor: ");
    $anio = leer("Año: ");

    $biblioteca[$titulo] = [
        "autor" => $autor,
        "anio" => $anio,
        "prestado" => false
    ];

    echo "Libro añadido correctamente.\n";
}

// Listar todos los libros
function listarLibros($biblioteca) {
    echo "\n--- LISTADO DE LIBROS ---\n";

    if (empty($biblioteca)) {
        echo "No hay libros en la biblioteca.\n";
        return;
    }

    foreach ($biblioteca as $titulo => $info) {
        $estado = $info["prestado"] ? "Prestado" : "Disponible";
        echo "• '$titulo' de " . $info["autor"] . " (" . $info["anio"] . ") - $estado\n";
    }
}

// Prestar un libro (marcar como prestado)
function prestarLibro(&$biblioteca) {
    $titulo = leer("Título del libro a prestar: ");

    if (!isset($biblioteca[$titulo])) {
        echo "Ese libro no existe.\n";
        return;
    }

    if ($biblioteca[$titulo]["prestado"]) {
        echo "Ese libro ya está prestado.\n";
    } else {
        $biblioteca[$titulo]["prestado"] = true;
        echo "Libro prestado correctamente.\n";
    }
}

// Devolver un libro (marcar como disponible)
function devolverLibro(&$biblioteca) {
    $titulo = leer("Título del libro a devolver: ");

    if (!isset($biblioteca[$titulo])) {
        echo "Ese libro no existe.\n";
        return;
    }

    if (!$biblioteca[$titulo]["prestado"]) {
        echo "Ese libro no estaba prestado.\n";
    } else {
        $biblioteca[$titulo]["prestado"] = false;
        echo "Libro devuelto correctamente.\n";
    }
}

// Buscar libros por autor
function buscarPorAutor($biblioteca) {
    $autor = leer("Introduce el nombre del autor: ");
    $encontrados = false;

    foreach ($biblioteca as $titulo => $info) {
        if (strtolower($info["autor"]) === strtolower($autor)) {
            $estado = $info["prestado"] ? "Prestado" : "Disponible";
            echo "• '$titulo' (" . $info["anio"] . ") - $estado\n";
            $encontrados = true;
        }
    }

    if (!$encontrados) {
        echo "No se encontraron libros de ese autor.\n";
    }
}

// Mostrar el menú
function mostrarMenu() {
    echo "\n--- MENÚ BIBLIOTECA ---\n";
    echo "1. Añadir libro\n";
    echo "2. Listar libros\n";
    echo "3. Prestar libro\n";
    echo "4. Devolver libro\n";
    echo "5. Buscar libros por autor\n";
    echo "6. Salir\n";
    echo "Elige una opción: ";
}

// Programa principal
do {
    mostrarMenu();
    $opcion = trim(fgets(STDIN));

    if ($opcion == "1") {
        anadirLibro($biblioteca);
    } elseif ($opcion == "2") {
        listarLibros($biblioteca);
    } elseif ($opcion == "3") {
        prestarLibro($biblioteca);
    } elseif ($opcion == "4") {
        devolverLibro($biblioteca);
    } elseif ($opcion == "5") {
        buscarPorAutor($biblioteca);
    } elseif ($opcion == "6") {
        echo "¡Hasta pronto!\n";
    } else {
        echo "Opción no válida.\n";
    }

} while ($opcion != "6");

?>

</body>
</html>