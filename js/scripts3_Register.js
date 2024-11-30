// Switch to register page
document.querySelector('#switch-to-register').addEventListener('click', function() {
    window.location.href = 'register.html';
});

// Switch to login page
document.querySelector('#switch-to-login').addEventListener('click', function() {
    window.location.href = 'index.html';
});

// Login form submit event
document.querySelector('#login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const email = document.querySelector('#login-form input[type="text"]').value;
    const password = document.querySelector('#login-form input[type="password"]').value;

    // Simulación de verificación de usuario registrado
    const registeredUsers = JSON.parse(localStorage.getItem('registeredUsers')) || [];
    const user = registeredUsers.find(user => user.email === email);

    if (user) {
        if (user.password === password) {
            alert('Inicio de sesión exitoso');
            // Redirigir a la página principal o dashboard
            window.location.href = 'dashboard.html';
        } else {
            alert('Contraseña incorrecta');
        }
    } else {
        alert('Usuario no registrado');
    }
});

// Register form submit event
document.querySelector('#register-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.querySelector('#register-form input[type="text"]').value;
    const email = document.querySelector('#register-form input[type="email"]').value;
    const password = document.querySelector('#register-form input[type="password"]').value;

    // Simulación de guardado de usuario registrado
    const registeredUsers = JSON.parse(localStorage.getItem('registeredUsers')) || [];
    registeredUsers.push({ name, email, password });
    localStorage.setItem('registeredUsers', JSON.stringify(registeredUsers));

    alert('Registro exitoso');
    // Redirigir a la página de inicio de sesión
    window.location.href = 'index.html';
});
