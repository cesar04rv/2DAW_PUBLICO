
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function permutaciones($V) {
    return array_reverse($V);
}

// Ejemplo
$vector = [1, 2, 3, 4, 5, 6,7];

echo "Vector original: ";
print_r($vector);

$resultado = permutaciones($vector);

echo "<br>Vector permutado: ";
print_r($resultado);
?>


</body>
</html>