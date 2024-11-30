<?php
include 'php/db.php'; // Incluir conexión

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar la reserva por ID
    $sql = "SELECT * FROM reservas WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos de la reserva
        $row = $result->fetch_assoc();
    } else {
        echo "<p>No se encontró la reserva con ese ID.</p>";
    }

    $conn->close();
} else {
    echo "<p>ID no proporcionado.</p>";
}
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

        <?php if (isset($row)) { ?>
        <!-- Formulario de edición de reserva -->
        <form method="POST" action="actualizar.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label for="checkin">Fecha de Entrada:</label>
            <input type="date" id="checkin" name="checkin" value="<?php echo $row['checkin']; ?>" required>

            <label for="checkout">Fecha de Salida:</label>
            <input type="date" id="checkout" name="checkout" value="<?php echo $row['checkout']; ?>" required>

            <label for="room_type">Tipo de Habitación:</label>
            <select id="room_type" name="room_type" required>
                <option value="Sencilla" <?php if ($row['room_type'] == 'Sencilla') echo 'selected'; ?>>Sencilla</option>
                <option value="Doble" <?php if ($row['room_type'] == 'Doble') echo 'selected'; ?>>Doble</option>
                <option value="Suite" <?php if ($row['room_type'] == 'Suite') echo 'selected'; ?>>Suite</option>
            </select>

            <button type="submit">Actualizar Reserva</button>
        </form>
        <?php } ?>
    </div>
</body>
</html>
