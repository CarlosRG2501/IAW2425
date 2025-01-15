<?php

//Conexión con BD
$servername = "sql308.thsite.top";
$username = "thsi_38097514";
$password = "jhDC!IqW";
$bd = "thsi_38097514_ejemplo";
$enlace = mysqli_connect($servername, $username, $password, $bd);
if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

//Construcción de la Query
$query = "UPDATE usuarios SET apellido = 'Rodriguez' WHERE nombre = 'Alberto'";

//Ejecución de la Query
$resultado = mysqli_query($enlace, $query);


//Procesamiento de los resultados 
if ($resultado){
    echo "Registro actualizado correctamente";
}

else {
    echo "Error en la actualizacion";
}

//Cierre de la conexión
mysql_close($enlace);

?>
