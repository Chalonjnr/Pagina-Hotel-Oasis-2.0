<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles1.css">
    <title>Registro de Reservas - Hotel Oasis</title>
</head>
<body>
    <div class="container">
        <h1>Lista de Todas las Reservas</h1>

        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hotel_oasis";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Consulta para obtener todas las reservas con un número de orden
        $sql = "SELECT @rownum := @rownum + 1 AS orden, id, name, email, checkin, checkout, room_type 
                FROM reservas, (SELECT @rownum := 0) r";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='reservas-table'>";
            echo "<thead><tr><th>Orden de Reserva</th><th>Nombre</th><th>Email</th><th>Fecha de Ingreso</th><th>Fecha de Salida</th><th>Tipo de Habitación</th><th>Acciones</th></tr></thead>";
            echo "<tbody>";

            // Mostrar cada registro
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["orden"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["checkin"] . "</td>
                        <td>" . $row["checkout"] . "</td>
                        <td>" . $row["room_type"] . "</td>
                        <td>
                            <a href='editar_reserva.php?id=" . $row["id"] . "' class='btn-modificar'>Modificar</a> 
                            <a href='php/eliminar.php?id=" . $row["id"] . "' class='btn-eliminar' onclick='return confirm(\"¿Estás seguro de eliminar esta reserva?\")'>Eliminar</a>
                        </td>
                    </tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No hay reservas registradas.</p>";
        }

        $conn->close();
        ?>

        <!-- Botón para volver al inicio -->
        <div class="volver-btn">
            <a href="sistem.html" class="btn-volver">Volver al Inicio</a>
        </div>
    </div>
</body>
</html>
