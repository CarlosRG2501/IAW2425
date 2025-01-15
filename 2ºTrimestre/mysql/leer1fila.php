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
$query = "SELECT * FROM usuarios LIMIT 1";

//Ejecución de la Query
$resultado = mysqli_query($enlace, $query);
print_r($resultado);

//Procesamiento de los resultados 
if (mysqli_num_rows($resultado)>0){
    //Al menos tengo un registro
    while($fila = mysqli_fetch_assoc($resultado)){
        echo "Nombre: " . $fila["nombre"] . "Apellido:" . $fila["apellido"] . "Email: " . $fila["email"] . "<br>";
    }
}
else {
    echo "<p>No hubo resultados en la fila</p>";
}

//Cierre de la conexión
mysql_close($enlace);

?>