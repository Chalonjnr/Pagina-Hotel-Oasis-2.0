<?php
// Incluir conexión a la base de datos
include 'db.php';

// Verificar si se recibió el ID de la reserva
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    // Verificar si el ID de la reserva existe en la base de datos
    $sql_check = "SELECT id FROM reservas WHERE id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("i", $id);
    $stmt_check->execute();
    $stmt_check->store_result();

    // Si la reserva no existe
    if ($stmt_check->num_rows == 0) {
        header("Location: ../eliminar_reserva.php?eliminada=false&no_existente=true");
        exit();
    }

    // Preparar la consulta para eliminar la reserva por ID
    $sql = "DELETE FROM reservas WHERE id = ?";

    // Preparar la sentencia
    if ($stmt = $conn->prepare($sql)) {
        // Vincular el parámetro
        $stmt->bind_param("i", $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir con mensaje de éxito
            header("Location: ../eliminar_reserva.php?eliminada=true");
            exit();
        } else {
            // En caso de error, redirigir con mensaje de error
            header("Location: ../eliminar_reserva.php?eliminada=false");
            exit();
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
} else {
    // Si no se recibe un ID, redirigir con error
    header("Location: ../eliminar_reserva.php?eliminada=false");
    exit();
}

// Cerrar la conexión
$conn->close();
?>
