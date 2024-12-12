-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS task_manager;

-- Usar la base de datos
USE task_manager;

-- Crear la tabla de tareas
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar datos de ejemplo
INSERT INTO tasks (title) VALUES ('Aprender RESTful APIs');
INSERT INTO tasks (title) VALUES ('Estudiar PDO en PHP');
INSERT INTO tasks (title) VALUES ('Construir una aplicación con PHP y REST');
