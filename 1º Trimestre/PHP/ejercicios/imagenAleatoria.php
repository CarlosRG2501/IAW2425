<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagen Aleatoria</title>
</head>
<body>
<?php

$imagenes = array(
    '1.jpg',
    '2.jpg',
    '3.jpg',
    '4.jpg',
);
echo "<img src='".$imagenes[rand(0, 4)]."'"; 
?>
    
    
</body>
</html>