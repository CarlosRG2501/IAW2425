<?php

// Conexión con BD
$servername = "sql308.thsite.top";
$username = "thsi_38097514";
$password = "jhDC!IqW";
$bd = "thsi_38097514_ejemplo";
$enlace = mysqli_connect($servername, $username, $password, $bd);

if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Construcción de la Query
$query = "INSERT INTO usuarios(nombre, apellido, email) VALUES ('Alberto' , 'MorenoC' , 'alberto@gmail.com')";

// Ejecución de la Query
$resultado = mysqli_query($enlace, $query);

// Procesamiento de los resultados 
if ($resultado) {
    echo "Registro insertado correctamente";
} else {
    echo "Error en la inserción: " . mysqli_error($enlace);
}

// Cierre de la conexión
mysqli_close($enlace);

?>
