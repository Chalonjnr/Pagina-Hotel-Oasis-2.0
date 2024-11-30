<?php
include 'db.php'; // Incluir conexión

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar la reserva por ID
    $sql = "SELECT * FROM reservas WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Reserva encontrada, redirigir a la página de edición
        $row = $result->fetch_assoc();
        header("Location: ../editar_reserva.php?id=" . $row['id']);
        exit();
    } else {
        echo "<p>No se encontró la reserva con ese ID.</p>";
    }

    $conn->close();
}
?>
