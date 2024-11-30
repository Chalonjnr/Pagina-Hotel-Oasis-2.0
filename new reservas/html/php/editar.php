<?php
include 'conectar.php';

$id = $_POST['id'];

$sql = "SELECT * FROM reservas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $reserva = $result->fetch_assoc();
    echo json_encode($reserva);
} else {
    echo json_encode(["error" => "No se encontró ninguna reserva con este ID."]);
}
$stmt->close();
$conn->close();
?>
