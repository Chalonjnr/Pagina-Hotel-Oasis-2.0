document.getElementById("registro-form").addEventListener("submit", function(event){
    let nombre = document.getElementById("nombre").value.trim();
    let correo = document.getElementById("correo").value.trim();
    let contrasena = document.getElementById("contrasena").value.trim();
    let confirmarContrasena = document.getElementById("confirmar_contrasena").value.trim();
    let mensajeDiv = document.getElementById("mensaje");

    mensajeDiv.textContent = ""; // Limpiar mensajes previos
    mensajeDiv.style.color = "red"; // Configurar color del mensaje

    // Validaciones
    if (nombre === "" || correo === "" || contrasena === "" || confirmarContrasena === "") {
        event.preventDefault();
        mensajeDiv.textContent = "Por favor, complete todos los campos.";
        return;
    }

    if (contrasena !== confirmarContrasena) {
        event.preventDefault();
        mensajeDiv.textContent = "Las contraseñas no coinciden.";
        return;
    }

    // Mensaje de espera opcional (opcional)
    mensajeDiv.textContent = "Registrando usuario...";
});
