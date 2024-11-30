<?php
include 'conectar.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$room_type = $_POST['room_type'];

$sql = "UPDATE reservas SET name = ?, email = ?, checkin = ?, checkout = ?, room_type = ?, updated_at = NOW() WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $name, $email, $checkin, $checkout, $room_type, $id);

if ($stmt->execute()) {
    echo "Reserva actualizada con éxito.";
} else {
    echo "Error al actualizar la reserva: " . $conn->error;
}
$stmt->close();
$conn->close();
?>
