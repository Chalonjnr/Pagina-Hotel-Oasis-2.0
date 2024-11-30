<?php
include 'php/db.php'; // Incluir conexión

// Verificar si el ID está en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Usar sentencias preparadas para evitar inyección SQL
    $stmt = $conn->prepare("SELECT * FROM reservas WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Comprobar si se encontró la reserva
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>No se encontró la reserva con ese ID.</p>";
        exit();
    }
} else {
    echo "<p>ID de reserva no especificado.</p>";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/confirmacion.js"></script>
    <script src="js/editar_reserva.js"></script>
    <title>Editar Reserva</title>
</head>
<body>
    <div class="container">
        <h1>Editar Reserva</h1>

        <!-- Verificar si se ha actualizado correctamente -->
        <?php if (isset($_GET['reserva_actualizada']) && $_GET['reserva_actualizada'] == 'true') : ?>
            <p class="mensaje-confirmacion">Reserva actualizada exitosamente.</p>
        <?php endif; ?>

        <!-- Formulario de edición de reserva -->
        <form method="POST" action="php/actualizar.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

            <label for="checkin">Fecha de Entrada:</label>
            <input type="date" id="checkin" name="checkin" value="<?php echo htmlspecialchars($row['checkin']); ?>" required>

            <label for="checkout">Fecha de Salida:</label>
            <input type="date" id="checkout" name="checkout" value="<?php echo htmlspecialchars($row['checkout']); ?>" required>

            <label for="room_type">Tipo de Habitación:</label>
            <select id="room_type" name="room_type" required>
                <option value="Sencilla" <?php if ($row['room_type'] == 'Sencilla') echo 'selected'; ?>>Sencilla</option>
                <option value="Doble" <?php if ($row['room_type'] == 'Doble') echo 'selected'; ?>>Doble</option>
                <option value="Suite" <?php if ($row['room_type'] == 'Suite') echo 'selected'; ?>>Suite</option>
            </select>

            <button type="submit">Actualizar Reserva</button>
        </form>

        <!-- Botón para volver al índice -->
        <div class="volver">
            <a href="sistem.html" class="btn-volver">Volver al inicio</a>
        </div>
    </div>
</body>
</html>
