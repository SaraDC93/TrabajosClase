<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'Database.php';
include_once 'Book.php';

$database = new Database();
$db = $database->getConnection();

$book = new Book($db);

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $stmt = $book->read();
    $books = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $books[] = $row;
    }
    echo json_encode($books);
} elseif ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $book->title = $data->title;
    $book->author = $data->author;
    $book->published_year = $data->published_year;
    $book->genre = $data->genre;

    if ($book->create()) {
        echo json_encode(["message" => "Libro agregado exitosamente."]);
    } else {
        echo json_encode(["message" => "Error al agregar el libro."]);
    }
} elseif ($method == 'PUT') {
    $data = json_decode(file_get_contents("php://input"));
    $book->id = $data->id;
    $book->title = $data->title;
    $book->author = $data->author;
    $book->published_year = $data->published_year;
    $book->genre = $data->genre;

    if ($book->update()) {
        echo json_encode(["message" => "Libro actualizado exitosamente."]);
    } else {
        echo json_encode(["message" => "Error al actualizar el libro."]);
    }
} elseif ($method == 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    $book->id = $data->id;

    if ($book->delete()) {
        echo json_encode(["message" => "Libro eliminado exitosamente."]);
    } else {
        echo json_encode(["message" => "Error al eliminar el libro."]);
    }
} else {
    echo json_encode(["message" => "Método no permitido."]);
}