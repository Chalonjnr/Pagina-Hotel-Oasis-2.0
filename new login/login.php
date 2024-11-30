<?php
session_start();

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
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Buscar usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verificar contraseña
        if (password_verify($contrasena, $usuario['contrasena'])) {
            // Guardar sesión y redirigir al área privada
            $_SESSION['usuario'] = $usuario['nombre'];
            echo "<script>
                alert('Inicio de sesión exitoso. Bienvenido {$usuario['nombre']}');
                window.location.href = 'bienvenida.php';
            </script>";
        } else {
            echo "<script>
                alert('Contraseña incorrecta.');
                window.history.back();
            </script>";
        }
    } else {
        echo "<script>
            alert('El correo no está registrado.');
            window.history.back();
        </script>";
    }
}

$conn->close();
?>
