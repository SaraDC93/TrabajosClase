--nombre de la BBDD con las iniciales
CREATE DATABASE T5SDC;
USE T5SDC;

--creamos la tabla usuarios con sus campos
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

--creamos la tabla para las tareas y sus campos
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

<<<<<<< HEAD
--Se crea el usuario con nombre usuSDC y contraseña Tarea 5 con los privilegios necesarios 
CREATE USER 'usuSDC' IDENTIFIED BY 'Tarea5';
=======
--Se crea el usuario con nombre usuSDC y contraseña Tareas con los privilegios necesarios 
CREATE USER 'usuSDC' IDENTIFIED BY 'Tareas';
>>>>>>> 44b2a46 (Primer commit)
GRANT ALL PRIVILEGES ON `T5SDC`.* TO 'usuSDC';
FLUSH PRIVILEGES;