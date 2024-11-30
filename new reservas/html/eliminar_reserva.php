<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/confirmacion.js"></script>
    <title>Eliminar Reserva</title>
</head>
<body>
    <div class="container">
        <h1>Eliminar Reserva</h1>

        <!-- Verificar si la reserva fue eliminada con éxito -->
        <?php if (isset($_GET['eliminada']) && $_GET['eliminada'] == 'true') : ?>
            <p class="mensaje-confirmacion">Reserva eliminada correctamente.</p>
        <?php elseif (isset($_GET['eliminada']) && $_GET['eliminada'] == 'false') : ?>
            <?php if (isset($_GET['no_existente']) && $_GET['no_existente'] == 'true') : ?>
                <p class="mensaje-error">La reserva con el ID ingresado no existe. Por favor, verifique el ID e intente nuevamente.</p>
            <?php else : ?>
                <p class="mensaje-error">INGRESAR EL ORDEN DE LA RESERVA PARA CONFIRMAR SU ELIMINACION.</p>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Formulario para eliminar la reserva -->
        <form id="eliminar-form" method="POST" action="php/eliminar.php" onsubmit="return confirmarEliminar()">
            <label for="id">ID de la Reserva:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit">Eliminar Reserva</button>
        </form>

        <footer>
            <a href="sistem.html">Volver al Inicio</a>
        </footer>
    </div>

    <!-- JavaScript de confirmación -->
    <script>
        function confirmarEliminar() {
            return confirm("¿Estás seguro de que deseas eliminar esta reserva?");
        }
    </script>
</body>
</html>
