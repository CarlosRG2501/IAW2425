<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feria</title>
</head>
<body>
    
  
<?php

$fechaActual = date('Y-m-d');
$date1 = date_create("2025-05-06");
$date2 = date_create($fechaActual);
$diff = date_diff($date1, $date2);
$diferencia = $diff->days; 

echo "Quedan " . $diferencia . " días para la feria";

?>
</body>
</html>

