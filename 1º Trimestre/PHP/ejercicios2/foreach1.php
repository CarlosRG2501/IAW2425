<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foreach</title>
</head>
<body>
    
  
<?php

$refranes = [
    "A quien madruga, Dios le ayuda.",
    "Camarón que se duerme, se lo lleva la corriente.",
    "Más vale tarde que nunca.",
    "El que mucho abarca, poco aprieta.",
    "Dime con quién andas y te diré quién eres.",
    "No hay mal que por bien no venga.",
    "A caballo regalado no le mires el diente.",
    "Quien no arriesga, no gana.",
    "La avaricia rompe el saco.",
    "Ojos que no ven, corazón que no siente."
];
        echo "<ul>";
        foreach ($refranes as $refran){
                echo "<li>$refran</li>";
        }
        echo "</ul>"; 


?>
</body>
</html>
