<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Leer el JSON desde el cuerpo de la solicitud
$json = file_get_contents("php://input");

// Validar si el cuerpo de la solicitud está vacío
if (!$json) {
    echo json_encode(["mensaje" => "No se enviaron datos"]);
    http_response_code(400);
    exit;
}

// Decodificar el JSON
$productos = json_decode($json, true);

// Validar errores en el JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["mensaje" => "Error al procesar el JSON: " . json_last_error_msg()]);
    http_response_code(400);
    exit;
}

// Validar formato: debe ser un array
if (!is_array($productos)) {
    echo json_encode(["mensaje" => "Formato de datos no válido. Se espera un array de productos."]);
    http_response_code(400);
    exit;
}

// Validar cada producto
foreach ($productos as $producto) {
    if (!isset($producto["id"], $producto["nombre"], $producto["cantidad"], $producto["precio"])) {
        echo json_encode(["mensaje" => "Faltan campos en un producto", "producto" => $producto]);
        http_response_code(400);
        exit;
    }
    if (!is_numeric($producto["cantidad"]) || !is_numeric($producto["precio"])) {
        echo json_encode(["mensaje" => "Los campos 'cantidad' y 'precio' deben ser numéricos.", "producto" => $producto]);
        http_response_code(400);
        exit;
    }
}

// Operaciones
$total_inventario = 0;
$productos_baja = [];
foreach ($productos as $producto) {
    $total_inventario += $producto["cantidad"] * $producto["precio"];
    if ($producto["cantidad"] < 5) {
        $productos_baja[] = $producto;
    }
}

// Respuesta final
echo json_encode([
    "mensaje" => "Operaciones realizadas correctamente",
    "total_inventario" => $total_inventario,
    "productos_baja" => $productos_baja
]);
http_response_code(200);
