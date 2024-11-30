<?php
// Incluir archivo de conexión a la base de datos
include('db_connection.php');

// Consultar todas las reservas
$query = "SELECT * FROM reservas";
$result = mysqli_query($conn, $query);

// Verificar si se encontraron resultados
if (mysqli_num_rows($result) > 0) {
    echo "<h1>Lista de Reservas</h1>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Email</th>";
    echo "<th>Check-in</th>";
    echo "<th>Check-out</th>";
    echo "<th>Tipo de Habitación</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Mostrar cada reserva
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['checkin'] . "</td>";
        echo "<td>" . $row['checkout'] . "</td>";
        echo "<td>" . $row['room_type'] . "</td>";
        echo "<td><a href='editar_reserva.php?id=" . $row['id'] . "'>Modificar</a></td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No se encontraron reservas.</p>";
}

// Cerrar conexión
mysqli_close($conn);
?>
