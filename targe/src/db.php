<?php 
// Se crea conexion a la base de datos con sus parametros necesarios

$host = "127.0.0.1:3307"; 
$user = "root"; 
$pass = ""; 
$db   = "targe"; 
 
// se crea el objeto de la conexion, si funciona se ejecuta la consulta
$conn = new mysqli($host, $user, $pass, $db); 
 
if ($conn->connect_error) {         //si hay un error en la conexion die finaliza la ejecucion
    die("Error de conexión: " . $conn->connect_error); 
} 
?><?php 
// Se crea conexion a la base de datos con sus parametros necesarios

$host = "127.0.0.1:3307"; 
$user = "root"; 
$pass = ""; 
$db   = "targe"; 
 
// se crea el objeto de la conexion, si funciona se ejecuta la consulta
$conn = new mysqli($host, $user, $pass, $db); 
 
if ($conn->connect_error) {         //si hay un error en la conexion die finaliza la ejecucion
    die("Error de conexión: " . $conn->connect_error); 
} 
?>