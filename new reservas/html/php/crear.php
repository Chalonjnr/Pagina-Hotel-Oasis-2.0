<?php
include 'db.php'; // Incluir conexión a la base de datos

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $room_type = $_POST['room_type'];

    // Preparar la consulta SQL para insertar la reserva
    $stmt = $conn->prepare("INSERT INTO reservas (name, email, checkin, checkout, room_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $checkin, $checkout, $room_type);

    if ($stmt->execute()) {
        // Redirigir al formulario con un mensaje de confirmación
        header("Location: ../crear_reserva.html?reserva_registrada=true");
        exit();
    } else {
        // Redirigir con mensaje de error
        header("Location: ../crear_reserva.html?reserva_registrada=false");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
