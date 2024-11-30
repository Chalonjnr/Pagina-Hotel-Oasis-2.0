<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/confirmacion.js"></script>
    <script src="js/buscar_reserva.js"></script>
    <title>Buscar Reserva</title>
</head>
<body>
    <div class="container">
        <h1>Buscar Reserva por ID</h1>

        <!-- Botón para regresar al inicio sin necesidad de buscar -->
        <div class="volver-btn">
            <a href="sistem.html" class="btn-volver-inicio">Volver al Inicio</a>
        </div>

        <!-- Formulario para buscar reserva -->
        <form method="GET" action="buscar_reserva.php">
            <label for="id">Orden de Reserva:</label>
            <input type="text" id="id" name="id" required>

            <button type="submit">Buscar Reserva</button>
        </form>

        <?php
        // Si la reserva fue encontrada y está redirigida a esta página con el ID
        if (isset($_GET['id'])) {
            include 'php/db.php'; // Incluir conexión

            $id = $_GET['id'];

            // Buscar la reserva por ID
            $sql = "SELECT * FROM reservas WHERE id = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Reserva encontrada, mostrar los datos de la reserva
                $row = $result->fetch_assoc();
        ?>

        <div class="reserva-encontrada">
            <h2>Reserva Encontrada</h2>
            <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
            <p><strong>Nombre:</strong> <?php echo $row['name']; ?></p>
            <p><strong>Correo:</strong> <?php echo $row['email']; ?></p>
            <p><strong>Entrada:</strong> <?php echo $row['checkin']; ?></p>
            <p><strong>Salida:</strong> <?php echo $row['checkout']; ?></p>
            <p><strong>Habitación:</strong> <?php echo $row['room_type']; ?></p>

            <!-- Opciones de modificar o regresar -->
            <div class="opciones">
                <a href="editar_reserva.php?id=<?php echo $row['id']; ?>" class="boton-modificar" onclick="return confirmarModificar()">Modificar Reserva</a>
                <a href="sistem.html" class="boton-regresar" onclick="return confirmarRegresar()">Regresar al Inicio</a>
            </div>
        </div>

        <?php
            } else {
                // Mensaje de error si no se encuentra el ID
                echo "<div class='mensaje-error'><p>No se encontró la reserva con el ID ingresado. Por favor, verifique e intente nuevamente.</p></div>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
