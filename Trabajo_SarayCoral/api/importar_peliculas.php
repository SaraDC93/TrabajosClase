<?php
require_once 'database.php';

$apiKey = $_ENV['TMDB_API_KEY']; // Guarda la clave en tu archivo .env
$apiUrl = "https://api.themoviedb.org/3/movie/popular?api_key=$apiKey&language=es-ES&page=1";

try {
    $pdo = conectarDB();
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['results'])) {
        foreach ($data['results'] as $movie) {
            $id_tmdb = $movie['id'];
            $titulo = $movie['title'];
            $descripcion = $movie['overview'];
            $poster = "https://image.tmdb.org/t/p/w500" . $movie['poster_path'];

            // Verificar si la película ya existe en la base de datos
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM peliculas WHERE id_tmdb = ?");
            $stmt->execute([$id_tmdb]);
            $exists = $stmt->fetchColumn();

            if (!$exists) {
                // Insertar la película en la base de datos
                $stmt = $pdo->prepare("INSERT INTO peliculas (id_tmdb, titulo, descripcion, poster) VALUES (?, ?, ?, ?)");
                $stmt->execute([$id_tmdb, $titulo, $descripcion, $poster]);
                echo "Película añadida: $titulo <br>";
            } else {
                echo "Película ya existe: $titulo <br>";
            }
        }
    } else {
        echo "No se encontraron películas en la API.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
