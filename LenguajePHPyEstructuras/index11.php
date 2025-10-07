<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$pedidos = [];

// Esta función muestra el menú en pantalla
function mostrarMenu() {
    echo "\n--- MENÚ PRINCIPAL ---\n";
    echo "1. Crear pedido\n";
    echo "2. Añadir plato a un pedido\n";
    echo "3. Ver detalles de un pedido\n";
    echo "4. Ver todos los pedidos\n";
    echo "5. Salir\n";
    echo "Elige una opción: ";
}
function leer($mensaje) {
    echo $mensaje;
    return trim(fgets(STDIN));
}

function crearPedido(&$pedidos) {
    $numero = leer("Número del pedido: ");

    if (isset($pedidos[$numero])) {
        echo "Ese pedido ya existe.\n";
        return;
    }

    $cliente = leer("Nombre del cliente: ");
    $pedidos[$numero] = [
        "cliente" => $cliente,
        "platos" => []
    ];

    echo "Pedido creado correctamente.\n";
}

function anadirPlato(&$pedidos) {
    $numero = leer("Número del pedido al que quieres añadir un plato: ");

    if (!isset($pedidos[$numero])) {
        echo "Ese pedido no existe.\n";
        return;
    }

    $nombrePlato = leer("Nombre del plato: ");
    $precioPlato = leer("Precio del plato (ej: 12.5): ");
    $precioPlato = floatval($precioPlato);

    $pedidos[$numero]["platos"][] = [
        "nombre" => $nombrePlato,
        "precio" => $precioPlato
    ];

    echo "Plato añadido correctamente.\n";
}
function verDetalles($pedidos) {
    $numero = leer("Número del pedido a consultar: ");

    if (!isset($pedidos[$numero])) {
        echo "Ese pedido no existe.\n";
        return;
    }

    $pedido = $pedidos[$numero];

    echo "\n--- DETALLES DEL PEDIDO $numero ---\n";
    echo "Cliente: " . $pedido["cliente"] . "\n";

    $total = 0;

    if (count($pedido["platos"]) === 0) {
        echo "No hay platos en este pedido.\n";
    } else {
        foreach ($pedido["platos"] as $plato) {
            echo "- " . $plato["nombre"] . ": " . $plato["precio"] . " €\n";
            $total += $plato["precio"];
        }

        echo "TOTAL: $total €\n";
    }
}
function listarPedidos($pedidos) {
    echo "\n--- TODOS LOS PEDIDOS ---\n";

    if (empty($pedidos)) {
        echo "No hay pedidos todavía.\n";
        return;
    }

    foreach ($pedidos as $numero => $pedido) {
        echo "Pedido $numero - Cliente: " . $pedido["cliente"] . "\n";
    }
}

do {
    mostrarMenu();
    $opcion = trim(fgets(STDIN));

    if ($opcion == "1") {
        crearPedido($pedidos);
    } elseif ($opcion == "2") {
        anadirPlato($pedidos);
    } elseif ($opcion == "3") {
        verDetalles($pedidos);
    } elseif ($opcion == "4") {
        listarPedidos($pedidos);
    } elseif ($opcion == "5") {
        echo "¡Gracias por usar el sistema de pedidos!\n";
    } else {
        echo "Opción no válida. Intenta de nuevo.\n";
    }

} while ($opcion != "5");

?>
</body>
</html>