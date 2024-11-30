document.getElementById('bookingForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const checkin = document.getElementById('checkin').value;
    const checkout = document.getElementById('checkout').value;
    const room = document.querySelector('input[name="room"]:checked').value;

    const confirmationMessage = `RESERVA CONFIRMADA\n\nNombre: ${name}\nCorreo: ${email}\nFecha de Ingreso: ${checkin}\nFecha de Salida: ${checkout}\nHabitación: ${room}`;
    document.getElementById('confirmationMessage').innerText = confirmationMessage;

    document.getElementById('confirmationModal').style.display = 'block';
});

document.getElementById('modifyButton').addEventListener('click', function() {
    document.getElementById('confirmationModal').style.display = 'none';
});

document.getElementById('cancelButton').addEventListener('click', function() {
    if (confirm('¿Estás seguro de que deseas cancelar?')) {
        document.getElementById('bookingForm').reset();
        document.getElementById('confirmationModal').style.display = 'none';
    }
});

document.getElementById('omitButton').addEventListener('click', function() {
    alert('Gracias por confiar en nosotros');
    document.getElementById('confirmationModal').style.display = 'none';
    alert('Registrado correctamente');
});
