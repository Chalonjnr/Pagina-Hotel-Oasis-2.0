// Función para mostrar el mensaje de confirmación
function mostrarConfirmacion(mensaje, tipo) {
    let confirmacionDiv = document.createElement('div');
    confirmacionDiv.className = `confirmacion ${tipo}`;
    confirmacionDiv.innerHTML = `
        <span>${mensaje}</span>
        <button class="cerrar" onclick="cerrarConfirmacion()">X</button>
    `;

    document.body.appendChild(confirmacionDiv);

    setTimeout(() => {
        cerrarConfirmacion();
    }, 5000);
}

// Función para cerrar el mensaje
function cerrarConfirmacion() {
    let confirmacionDiv = document.querySelector('.confirmacion');
    if (confirmacionDiv) {
        confirmacionDiv.remove();
    }
}
// confirmacion.js

function confirmarModificar() {
    return confirm("¿Estás seguro de que deseas modificar esta reserva?");
}

function confirmarRegresar() {
    return confirm("¿Estás seguro de que deseas regresar al inicio?");
}
