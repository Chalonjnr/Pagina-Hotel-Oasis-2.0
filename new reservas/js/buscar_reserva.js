// Confirmación para modificar reserva
function confirmarModificar() {
    return confirm("¿Estás seguro de que deseas modificar esta reserva?");
}

// Confirmación para regresar
function confirmarRegresar() {
    return confirm("¿Estás seguro de que deseas regresar sin realizar cambios?");
}

// Si el parámetro de URL es encontrado, mostrar un mensaje de confirmación.
if (window.location.search.indexOf("reserva_encontrada=true") > -1) {
    mostrarConfirmacion("Reserva encontrada con éxito. Ahora puedes editarla.", "success");
}
