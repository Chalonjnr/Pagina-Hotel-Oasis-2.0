<?php
include 'db.php'; // Incluir conexión

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar reserva por ID
    $sql = "SELECT * FROM reservas WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar detalles de la reserva
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Detalles de la Reserva</title>
</head>
<body>
    <div class="container">
        <h1>Detalles de la Reserva</h1>
        <div class="reserva-details">
            <p><strong>Nombre:</strong> <?php echo $row['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
            <p><strong>Fecha de Entrada:</strong> <?php echo $row['checkin']; ?></p>
            <p><strong>Fecha de Salida:</strong> <?php echo $row['checkout']; ?></p>
            <p><strong>Tipo de Habitación:</strong> <?php echo $row['room_type']; ?></p>
        </div>

        <div class="actions">
            <a href="editar_reserva.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Editar Reserva</a>
            <a href="eliminar_reserva.php?id=<?php echo $row['id']; ?>" class="btn btn-delete">Eliminar Reserva</a>
        </div>
    </div>
</body>
</html>
<?php
    } else {
        echo "<p>No se encontró la reserva con ese ID.</p>";
    }

    $conn->close();
}
?>
