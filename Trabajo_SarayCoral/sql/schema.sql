-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS videoclub;
USE videoclub;

-- Crear tabla de Usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Se almacenará con password_hash()
    rol ENUM('admin', 'cliente') DEFAULT 'cliente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear tabla de Películas
CREATE TABLE peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    director VARCHAR(255) NOT NULL,
    genero VARCHAR(100),
    duracion INT, -- en minutos
    fecha_estreno DATE,
    sinopsis TEXT,
    imagen_url VARCHAR(255), -- URL de la imagen del póster
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear tabla de Inventario de Películas
CREATE TABLE inventario_peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pelicula_id INT NOT NULL,
    cantidad_disponible INT NOT NULL DEFAULT 1,
    FOREIGN KEY (pelicula_id) REFERENCES peliculas(id) ON DELETE CASCADE
);

-- Crear tabla de Alquileres
CREATE TABLE alquileres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    pelicula_id INT NOT NULL,
    fecha_alquiler TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_devolucion TIMESTAMP NULL,
    estado ENUM('Alquilada', 'Devuelta') DEFAULT 'Alquilada',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (pelicula_id) REFERENCES peliculas(id) ON DELETE CASCADE
);

-- Crear tabla de Pagos (Para integrar Paypal u otro método de pago)
CREATE TABLE pagos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    metodo_pago ENUM('Paypal', 'Tarjeta', 'Efectivo') NOT NULL,
    estado ENUM('Pendiente', 'Completado', 'Cancelado') DEFAULT 'Pendiente',
    fecha_pago TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Crear tabla de Reseñas (para que los usuarios puedan calificar las películas)
CREATE TABLE resenas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    pelicula_id INT NOT NULL,
    calificacion INT CHECK (calificacion BETWEEN 1 AND 5), -- Calificación de 1 a 5 estrellas
    comentario TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (pelicula_id) REFERENCES peliculas(id) ON DELETE CASCADE
);

