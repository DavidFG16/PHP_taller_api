<?php
require_once "src/db.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

//Obtener / {path} / {otherpath} ...{}
// 0->products
// 1-> 1
$recurso = $uri[0];
header('Content-Type: application/json');


if ($recurso == 'productos') {
    require 'productos.php';
} elseif ($recurso == 'categorias') {
    require 'categorias.php';
} elseif ($recurso == 'promociones') {
    require 'promociones.php';
} else {
    echo json_encode(['error' => 'Recurso no encontrado', 'code' => 404, 'errorUrl' => 'https://http.cat/images/404.jpg']);
}