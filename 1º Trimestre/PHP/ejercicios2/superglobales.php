<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>superglobales</title>
</head>
<body>
    
  
<?php

echo "<h1>Informacion</h1>";

$ipUsuario = $_SERVER['REMOTE_ADDR'];

$navegadorUsuario = $_SERVER['HTTP_USER_AGENT'];

$paginaReferida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'No hay página de referencia';

echo "<p>Dirección IP: $ipUsuario</p>";
echo "<p>Navegador: $navegadorUsuario</p>";
echo "<p>Página de referencia: $paginaReferida</p>";

?>
</body>
</html>
