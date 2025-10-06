<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
$numero = []; // Definimos el array global

function rellenar() {
    global $numero; // Importamos la variable global dentro de la función
    
    while (count($numero) < 10) {
        $al = rand(0, 100);
        $numero[] = $al;
    }
}

// Llamamos a la función
rellenar();

// Mostramos el resultado
echo "Array generado:<br>";
print_r($numero);

// Array de cuadrados
$cuadrado = [];

function rellenarCuadrado() {
    global $numero, $cuadrado; // Usamos los dos arrays
    
    foreach ($numero as $valor) {
        $res = $valor * $valor;
        $cuadrado[] = $res;
    }
}

rellenarCuadrado();

echo "<br><br>Array de cuadrados:<br>";
print_r($cuadrado);


$cubo = [];
function rellenarCubo(){
global $numero, $cubo;

foreach ($numero as $valor) {
    $res = pow($valor , 3);
    $cubo[] = $res;
}


    
}
rellenarCubo();
echo "<br><br>Array de cubos:<br>";

print_r($cubo);

$salida= array_column($cubo, );
?>




</body>
</html>