<?php
require_once "src/db.php";

$method =$_SERVER['REQUEST_METHOD'];

// localhost:8081/?filter=datos

$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

// Obtener /{path} / {otherpath}
// 0-> products
// 1 -> 1

$recurso = $uri[0];
$id = $uri[1] ?? null;

header('Content-Type: application/json');

// http://localost:8081{/....} -> Endpoints
if($recurso !== 'categorias'){
    http_response_code(404);
    echo json_encode(['error' => 'Recurso no encontrado', 'code' => 404, 'errorUrl' => 'https://http.cat/status/404']);
    exit;
}


switch ($method) {
    case 'GET':
        $stmt = $pdo ->prepare("SELECT id, nombre FROM categorias");
        $stmt ->execute();
        $response = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);
    break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $stm = $pdo->prepare("INSERT INTO categorias(nombre) VALUES(?)");
        $stm->execute([
            $data['nombre'],
        ]);
        http_response_code(201);
        $data['id'] = $pdo->lastInsertId();
        echo json_encode($data);
        break;
    case 'PUT':
        if(!$id){
            http_response_code(400);
            echo json_encode(['error' => 'ID no encontrado', 'code' => 404, 'errorUrl' => 'https://http.cat/status/400']);
            exit;
        }
        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $pdo->prepare("UPDATE categorias SET nombre = ?  WHERE id = ?");
        $stmt->execute([
            $data['nombre'],
            $id,
        ]);
        echo json_encode($data);
        break;
        case 'DELETE':
        $stmt2 = $pdo ->prepare("SELECT nombre FROM categorias WHERE id =?");
        $stmt2->execute([$id]);
        $stmt2 ->execute();
        $response = $stmt2 ->fetch(PDO::FETCH_ASSOC);

        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $pdo->prepare("DELETE FROM categorias WHERE id =?");
        $stmt->execute([$id]);
        http_response_code(200);
        if($stmt->rowCount()>0){
        echo json_encode($response); 
        }else{
            http_response_code(400);
            echo json_encode(['error' => 'ID no encontrado', 'code' => 404, 'errorUrl' => 'https://http.cat/status/400']);
            exit;
        }
        break;
} 