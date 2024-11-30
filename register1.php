<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];

    // Verificar que las contraseñas coincidan
    if ($contrasena === $confirmar_contrasena) {
        // Encriptar la contraseña
        $hashed_password = password_hash($contrasena, PASSWORD_BCRYPT);

        // Preparar la consulta SQL
        $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('Registro exitoso. Por favor, inicie sesión.');
                window.location.href = 'index.html';
            </script>";
        } else {
            echo "<script>
                alert('Error al registrar: " . $conn->error . "');
                window.history.back();
            </script>";
        }
    } else {
        // Si las contraseñas no coinciden
        echo "<script>
            alert('Las contraseñas no coinciden. Inténtalo de nuevo.');
            window.history.back();
        </script>";
    }
}

$conn->close();
?>
