// Función para validar el formulario
function validarFormulario() {
    // Obtener los valores de los campos del formulario
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var checkin = document.getElementById('checkin').value;
    var checkout = document.getElementById('checkout').value;
    var roomType = document.getElementById('room_type').value;

    // Validación del nombre
    if (name.trim() === '') {
        alert('Por favor, ingresa tu nombre.');
        return false; // Prevenir el envío del formulario
    }

    // Validación del correo electrónico
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert('Por favor, ingresa un correo electrónico válido.');
        return false;
    }

    // Validación de las fechas
    if (checkin && checkout) {
        var checkinDate = new Date(checkin);
        var checkoutDate = new Date(checkout);

        // Verificar que la fecha de entrada no sea en el pasado
        var currentDate = new Date();
        currentDate.setHours(0, 0, 0, 0); // Eliminar la hora de la fecha actual

        if (checkinDate < currentDate) {
            alert('La fecha de entrada no puede ser en el pasado.');
            return false;
        }

        // Verificar que la fecha de entrada sea anterior a la fecha de salida
        if (checkinDate >= checkoutDate) {
            alert('La fecha de salida debe ser posterior a la fecha de entrada.');
            return false;
        }
    }

    // Validación de tipo de habitación
    if (roomType === '') {
        alert('Por favor, selecciona el tipo de habitación.');
        return false;
    }

    // Si todo es válido, enviar el formulario
    return true;

    
}
