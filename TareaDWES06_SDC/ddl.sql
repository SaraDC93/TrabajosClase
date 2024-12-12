--nombre de la BBDD con las iniciales
CREATE DATABASE SDC_books;
USE SDC_books;



--Se crea el usuario con nombre usuSDC y contraseña Tareas con los privilegios necesarios
CREATE USER 'usuSDC' IDENTIFIED BY 'Tareas';
GRANT ALL PRIVILEGES ON `SDC_books`.* TO 'usuSDC';
FLUSH PRIVILEGES;