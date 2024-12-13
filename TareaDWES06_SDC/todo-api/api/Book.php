<?php
class Book {
    private $conn;
    private $table = "books";

    public $id;
    public $title;
    public $author;
    public $published_year;
    public $genre;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Leer todos los libros
    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Crear un libro
    public function create() {
        $query = "INSERT INTO " . $this->table . " SET title=?, author=?, published_year=?, genre=?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->title);
        $stmt->bindParam(2, $this->author);
        $stmt->bindParam(3, $this->published_year);
        $stmt->bindParam(4, $this->genre);


        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Actualizar un libro
    public function update() {
        $query = "UPDATE " . $this->table . " SET created_at = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->created_at);
        $stmt->bindParam(2, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar un libro
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
