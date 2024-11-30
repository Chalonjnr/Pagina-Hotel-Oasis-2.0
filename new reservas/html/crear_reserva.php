<?php
// Incluir conexión a la base de datos
include 'php/db.php';

// Verificar si se recibió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $room_type = $_POST['room_type'];

    // Preparar la consulta de inserción (no se incluye el id, ya que es AUTO_INCREMENT)
    $stmt = $conn->prepare("INSERT INTO reservas (name, email, checkin, checkout, room_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $checkin, $checkout, $room_type);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir con el parámetro de confirmación
        header("Location: crear_reserva.php?reserva_registrada=true");
        exit();
    } else {
        echo "Error al registrar la reserva: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Crear Nueva Reserva</title>
</head>
<body>
    <div class="container">
        <h1>Crear Nueva Reserva</h1>
        
        <!-- Verificar si se ha registrado correctamente -->
        <?php if (isset($_GET['reserva_registrada']) && $_GET['reserva_registrada'] == 'true') : ?>
            <p class="mensaje-confirmacion">Reserva registrada correctamente.</p>
        <?php endif; ?>

        <!-- Formulario para crear la reserva -->
        <form id="crear-form" method="POST" action="crear_reserva.php">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="checkin">Fecha de Entrada:</label>
            <input type="date" id="checkin" name="checkin" required min="<?php echo date('Y-m-d'); ?>">

            <label for="checkout">Fecha de Salida:</label>
            <input type="date" id="checkout" name="checkout" required min="<?php echo date('Y-m-d'); ?>">

            <label for="room_type">Tipo de Habitación:</label>
            <select id="room_type" name="room_type" required>
                <option value="Sencilla">Sencilla</option>
                <option value="Doble">Doble</option>
                <option value="Suite">Suite</option>
            </select>

            <button type="submit">Crear Reserva</button>
        </form>

        <footer>
            <a href="sistem.html">Volver al Inicio</a>
        </footer>
    </div>

    <!-- Script de validación de fechas -->
    <script>
        document.getElementById('crear-form').addEventListener('submit', function(event) {
            // Obtener las fechas de entrada y salida
            const checkin = document.getElementById('checkin').value;
            const checkout = document.getElementById('checkout').value;

            // Obtener la fecha actual
            const today = new Date();
            const todayDate = today.toISOString().split('T')[0]; // Formato: YYYY-MM-DD

            // Validar que la fecha de entrada no sea menor que la fecha actual
            if (checkin < todayDate) {
                alert('La fecha de entrada no puede ser anterior a la fecha actual.');
                event.preventDefault(); // Evitar que se envíe el formulario
                return;
            }

            // Validar que la fecha de salida no sea menor que la fecha de entrada
            if (checkout <= checkin) {
                alert('La fecha de salida debe ser posterior a la fecha de entrada.');
                event.preventDefault(); // Evitar que se envíe el formulario
                return;
            }
        });
    </script>
</body>
</html>

