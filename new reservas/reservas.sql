-- Crear la base de datos
CREATE DATABASE hotel_oasis;

-- Usar la base de datos
USE hotel_oasis;

-- Crear tabla para las reservas
CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- Identificador único de la reserva
    name VARCHAR(255) NOT NULL,                 -- Nombre del cliente
    email VARCHAR(255) NOT NULL,                -- Correo electrónico del cliente
    checkin DATE NOT NULL,                      -- Fecha de entrada
    checkout DATE NOT NULL,                     -- Fecha de salida
    room_type ENUM('Sencilla', 'Doble', 'Suite') NOT NULL, -- Tipo de habitación
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP, -- Fecha de creación del registro
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Fecha de última modificación
);


USE hotel_oasis;
select * from reservas;

DROP DATABASE hotel_oasis;

