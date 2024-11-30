<?php
// Datos de conexión
$host = 'localhost'; // o la IP de tu servidor de base de datos
$user = 'root'; // tu usuario de la base de datos
$password = ''; // tu contraseña de la base de datos
$dbname = 'hotel_oasis'; // el nombre de tu base de datos

// Crear conexión
$conn = mysqli_connect($host, $user, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
