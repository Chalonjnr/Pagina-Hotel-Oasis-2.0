<?php
include 'db.php'; // Incluir conexión

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Recoger los datos del formulario
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $room_type = $_POST['room_type'];

    // Actualizar la reserva en la base de datos
    $sql = "UPDATE reservas SET 
            name='$name', 
            email='$email', 
            checkin='$checkin', 
            checkout='$checkout', 
            room_type='$room_type' 
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../editar_reserva.php?id=$id&reserva_actualizada=true");
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }

    $conn->close();
}
?>
